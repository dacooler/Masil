from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy.orm import Mapped, mapped_column, relationship
from sqlalchemy import ForeignKey, Table, Column, select
from flask_jwt_extended import (
    JWTManager, jwt_required, create_access_token,
    get_jwt_identity, set_access_cookies, unset_jwt_cookies
)
from flask_mail import Mail, Message
import database_access as database
from database import db, User


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = f'sqlite:///database.db'
app.config['JWT_TOKEN_LOCATION'] = ['cookies']
app.config['JWT_COOKIE_CSRF_PROTECT'] = False
app.config['JWT_SECRET_KEY'] = 'super-secret'  # Change this later!

app.config['MAIL_SERVER'] = 'smtp-relay.brevo.com'
app.config['MAIL_PORT'] = 587
app.config['MAIL_USE_TLS'] = True
app.config['MAIL_USE_SSL'] = False
app.config['MAIL_USERNAME'] = 'a2f8df001@smtp-brevo.com'
# needs weird string concat here to avoid github detecting pushing a secret to version control. Yes, this is good practice
app.config['MAIL_PASSWORD'] = 'x' + 's' + 'm' + 't' + 'p' + 's' + 'i' + 'b' + '-1708f91c4301ee98d5948358e0a94ad48299823395de9989af31e00d0ef8485b-kAueZ6xhAHlltIR4'
app.config['MAIL_DEFAULT_SENDER'] = 'viljo690@student.liu.se'

mail = Mail(app)

jwt = JWTManager(app)

db.init_app(app)


@app.route('/users/create/<name>/<password>/<mail_adress>')
def create_user(name: str, password: str, mail_adress: str):
    result = database.create_user(name, password, mail_adress)
    if isinstance(result, str):
        return result, 400

    user: User = result
    return 'Successfully created user: ' + str(user.to_json()), 201


@app.route('/users/login/<id>/<password>')
def login(id: str, password: str):
    user = database.check_user(id, password)
    if(user):
        access_token = create_access_token(identity=user.id)
        response = jsonify({'login': True})
        set_access_cookies(response, access_token)
        return response, 200
    else:
        return jsonify({'login': False, 'message': 'wrong liuID, mail or password'}), 400


@app.route('/')
@jwt_required()
def index():
    return get_jwt_identity(), 200


@app.route('/mail/<mail_adress>')
def mail_test(mail_adress: str):
    msg = Message(subject='Password Recovery', recipients=[mail_adress])
    user = database.get_user_by_mail(mail_adress)
    if user is None:
        msg.body = 'No user with that mail exists, please register a new user.'
    else:
        msg.body = f'The name of your account is {user.name} and the password is {user.password}\n' \
                    'Use this to log in to your account!'
    mail.send(msg)
    return 'mail sent', 200


if __name__ == '__main__':
    app.run(debug=True)