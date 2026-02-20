from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy.orm import Mapped, mapped_column, relationship
from sqlalchemy import ForeignKey, Table, Column, select
from flask_jwt_extended import (
    JWTManager, jwt_required, create_access_token,
    get_jwt_identity, set_access_cookies, unset_jwt_cookies
)
import database_access as database
from database import db, User


app = Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = f'sqlite:///database.db'
app.config['JWT_TOKEN_LOCATION'] = ['cookies']
app.config['JWT_COOKIE_CSRF_PROTECT'] = False
app.config['JWT_SECRET_KEY'] = 'super-secret'  # Change this later!

jwt = JWTManager(app)

db.init_app(app)


@app.route('/users/create/<name>/<password>')
def create_user(name: str, password: str):
    result = database.create_user(name, password)
    if isinstance(result, str):
        return result, 400

    user: User = result
    return 'Successfully created user: ' + str(user.to_json()), 201


@app.route('/users/login/<name>/<password>')
def login(name: str, password: str):
    if(database.check_user(name, password)):
        access_token = create_access_token(identity=name)

        response = jsonify({'login': True})
        set_access_cookies(response, access_token)
        return response, 200
    else:
        return jsonify({'login': False, 'message': 'wrong name or password'}), 400


@app.route('/')
@jwt_required()
def index():
    return get_jwt_identity(), 200


if __name__ == '__main__':
    with app.app_context():
        db.create_all()
    app.run()