from database import db, User, Page
from sqlalchemy import select


def get_user_by_name(name: str) -> User | None:
    return db.session.execute(select(User).filter_by(name=name)).scalar_one_or_none()


def get_user_by_password(password: str) -> User | None:
    return db.session.execute(select(User).filter_by(password=password)).scalar_one_or_none()


def get_user_by_mail(mail_adress: str) -> User | None:
    return db.session.execute(select(User).filter_by(mail_adress=mail_adress)).scalar_one_or_none()


def get_user_by_id(id: int) -> User | None:
    return db.session.execute(select(User).filter_by(id=id)).scalar_one_or_none()


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


def get_page(id: str):
    return db.session.execute(select(Page).filter_by(id=id)).scalar_one_or_none()


def get_or_create_page(id: str):
    """Returns the page with id or creates and returns a new page with id if it doesn't exist."""
    page = get_page(id)
    if page is None:
        page = Page(id)
        db.session.add(page)
        db.session.commit()
    return page


def like_page(page: Page):
    page.likes += 1
    db.session.commit()


def like_or_create_page(page_id: str):
    """Marks a certain page as liked.
    If page does not exist, page is created and then liked.
    """
    page = get_or_create_page(page_id)
    like_page(page)


def get_likes(page: Page):
    return page.likes
