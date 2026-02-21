from database import db, User
from sqlalchemy import select


def get_user_by_name(name: str) -> User | None:
    return db.session.execute(select(User).filter_by(name=name)).scalar_one_or_none()

def get_user_by_password(password: str) -> User | None:
    return db.session.execute(select(User).filter_by(password=password)).scalar_one_or_none()

def get_user_by_mail(mail_adress: str) -> User | None:
    return db.session.execute(select(User).filter_by(mail_adress=mail_adress)).scalar_one_or_none()

def create_user(name: str, password: str, mail_adress: str):
    user = get_user_by_name(name)
    if user:
        return 'This name is already taken!'
    
    user = get_user_by_password(password)
    if user:
        return f'This password is already used by {user.name}!'

    user = get_user_by_mail(mail_adress)
    if user:
        return f'This mail adress is already used by {user.name}!'

    user = User(name, password, mail_adress)
    db.session.add(user)
    db.session.commit()
    return user

def check_user(id: str, password: str):
    user = get_user_by_name(id)
    if user is None:
        user = get_user_by_mail(id)

    return user if user is not None and user.password == password else None
