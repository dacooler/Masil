from flask import Flask, request, jsonify
from flask_jwt_extended import (
    JWTManager, jwt_required, create_access_token,
    get_jwt_identity, set_access_cookies, unset_jwt_cookies
)
import database_access as database
import mail
from database import db, User
from flask_cors import CORS


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = f'sqlite:///database.db'
app.config['JWT_TOKEN_LOCATION'] = ['cookies', 'headers']
app.config['JWT_COOKIE_CSRF_PROTECT'] = False
app.config['JWT_SECRET_KEY'] = 'super-secret-key-that-is-at-least-32-bytes-long-for-security-reasons'  # Change this later!

"""
app.config['MAIL_SERVER'] = 'smtp-relay.brevo.com'
app.config['MAIL_PORT'] = 587
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USE_SSL'] = False
app.config['MAIL_USERNAME'] = 'a2f8df001@smtp-brevo.com'
# needs weird string concat here to avoid github detecting pushing a secret to version control. Yes, this is good practice
app.config['MAIL_PASSWORD'] = 'x' + 's' + 'm' + 't' + 'p' + 's' + 'i' + 'b' + '-1708f91c4301ee98d5948358e0a94ad48299823395de9989af31e00d0ef8485b-kAueZ6xhAHlltIR4'
app.config['MAIL_DEFAULT_SENDER'] = 'viljo690@student.liu.se'
"""

jwt = JWTManager(app)

db.init_app(app)

CORS(app, supports_credentials=True)


@app.route('/users/create/<name>/<password>/<mail_adress>')
def create_user(name: str, password: str, mail_adress: str):
    result = database.create_user(name, password, mail_adress)
    if isinstance(result, str):
        return result, 400

    user: User = result
    return jsonify({'status': 'success', 'message': 'Successfully created user: ' + str(user.to_json())}), 201


@app.route('/users/login/<id>/<password>')
def login(id: str, password: str):
    user = database.check_user(id, password)
    if user:
        access_token = create_access_token(identity=user.name)
        response = jsonify({'login': True})
        # Attach HttpOnly cookie
        set_access_cookies(response, access_token, secure=False, samesite="None")
        return response, 200  # ✅ return the response with cookie
    else:
        return jsonify({'login': False, 'message': 'wrong liuID, mail or password'}), 400

@app.route('/')
@jwt_required()
def index():
    return get_jwt_identity(), 200


@app.route('/mail/<mail_adress>')
def mail_recover_password(mail_adress: str):
    user = database.get_user_by_mail(mail_adress)
    if user is None:
        content = 'No user with that mail exists, please register a new user.'
    else:
        content = f'The name of your account is {user.name} and the password is {user.password}\n' \
                   'Use this to log in to your account!'
    response = mail.send('Password Recovery', content, mail_adress)

    return response.text, response.status_code


@app.route('/like/<page_id>')
@jwt_required()
def like_page(page_id: str):
    name = get_jwt_identity()
    user = database.get_user_by_name(name)
    database.like_or_create_page(page_id, user)
    return 'Liked page', 200


@app.route('/getlikes/<page_id>')
def get_likes_of_page(page_id: str):
    page = database.get_or_create_page(page_id)
    likes = database.get_likes(page)
    return jsonify({'page': page_id, 'likes': likes}), 200


if __name__ == '__main__':
    app.run(debug=True)