# Carte Collezionabili Online

Progetto linguaggi e tecnologie per il web

Table Users
create table Users (
    email varchar(40), 
    nome varchar(40),
    paswd varchar(255) not null,
    primary key (email)
);
