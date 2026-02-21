import os
from flask import Flask, request, jsonify
from flask_sqlalchemy import SQLAlchemy
from sqlalchemy.orm import Mapped, mapped_column, relationship
from sqlalchemy import ForeignKey, Table, Column, select
from flask_bcrypt import Bcrypt


db = SQLAlchemy()

"""
read_messages = Table(
    "read_messages",
    db.Model.metadata,
    Column("user_id", ForeignKey("user.id"), primary_key=True),
    Column("message_id", ForeignKey("message.id"), primary_key=True),
)
"""


class User(db.Model):
    id:          Mapped[int] = mapped_column(primary_key=True)
    name:        Mapped[str] = mapped_column(unique=True, nullable=False)
    password:    Mapped[str] = mapped_column(unique=True, nullable=False)
    mail_adress: Mapped[str] = mapped_column(unique=True, nullable=False)

    def __init__(self, name: str, password: str, mail_adress: str):
        self.name = name
        self.password = password
        self.mail_adress = mail_adress

    def to_json(self):
        return {'id': self.id, 'name': self.name, 'password': self.password, 'mail_adress': self.mail_adress}
