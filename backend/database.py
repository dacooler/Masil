import os
from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy.orm import Mapped, mapped_column, relationship
from sqlalchemy import ForeignKey, Table, Column, select
from flask_bcrypt import Bcrypt


db = SQLAlchemy()


liked_page = Table(
    "liked_page",
    db.Model.metadata,
    Column("page_id", ForeignKey("page.id"), primary_key=True),
    Column("user_id", ForeignKey("user.id"), primary_key=True),
)


class Page(db.Model):
    id:       Mapped[str] =        mapped_column(primary_key=True)
    liked_by: Mapped[list['User']] = relationship(secondary=liked_page, back_populates='liked_pages')

    def __init__(self, id: str):
        self.id = id
        self.likes = 0


class User(db.Model):
    id:          Mapped[int] =        mapped_column(primary_key=True)
    name:        Mapped[str] =        mapped_column(unique=True, nullable=False)
    password:    Mapped[str] =        mapped_column(unique=True, nullable=False)
    mail_adress: Mapped[str] =        mapped_column(unique=True, nullable=False)
    liked_pages: Mapped[list[Page]] = relationship(secondary=liked_page, back_populates='liked_by')

    def __init__(self, name: str, password: str, mail_adress: str):
        self.name = name
        self.password = password
        self.mail_adress = mail_adress

    def to_json(self):
        return {'id': self.id, 'name': self.name, 'password': self.password, 'mail_adress': self.mail_adress}
