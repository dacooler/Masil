from flask_sqlalchemy import SQLAlchemy
from sqlalchemy.orm import Mapped, mapped_column, relationship


db = SQLAlchemy()


class Page(db.Model):
    id:    Mapped[str] = mapped_column(primary_key=True)
    likes: Mapped[int] = mapped_column(nullable=False)

    def __init__(self, id: str):
        self.id = id
        self.likes = 0


class User(db.Model):
    id:          Mapped[int] =        mapped_column(primary_key=True)
    name:        Mapped[str] =        mapped_column(unique=True, nullable=False)
    password:    Mapped[str] =        mapped_column(unique=True, nullable=False)
    mail_adress: Mapped[str] =        mapped_column(unique=True, nullable=False)

    def __init__(self, name: str, password: str, mail_adress: str):
        self.name = name
        self.password = password
        self.mail_adress = mail_adress

    def to_json(self):
        return {'id': self.id, 'name': self.name, 'password': self.password, 'mail_adress': self.mail_adress}
