create database regime;

\c regime;

create table genre(
    id serial primary key,
    nom varchar(20) not null
);

create table utilisateur(
    id serial primary key,
    nom varchar(50) not null,
    email varchar(50)not null,
    "password" varchar(255) not null,
    idgenre int references genre(id),
    poids numeric not null,
    taille numeric not null,
    dateinscription date not null,
    isgold boolean not null default FALSE
);

create table objectif(
    id serial primary key,
    nom varchar(50) not null
);

create table utilisateur_objectif(
    idutilisateur int references utilisateur(id),
    idobjectif int references objectif(id),
    dateobjectif timestamp not null,
    poids numeric not null
);

create table regime(
    id serial primary key,
    nom varchar(50) not null,
    prix numeric not null,
    apport numeric not null,
    duree int not null,
    photo varchar(255) not null,
    idobjectif int references objectif(id)
);

create table plat(
    id serial primary key,
    nom varchar(50) not null
);

create table regime_plat(
    idregime int references regime(id),
    idplat int references plat(id),
    pourcentage numeric not null
);


create table code(
    id serial primary key,
    token text not null,
    valeur numeric not null,
    statut int not null
);

create table recharge_utilisateur(
    id serial primary key,
    idutilisateur int references utilisateur(id),
    idcode int references code(id),
    daterecharge timestamp not null,
    statut int not null
);

create table achat_utilisateur (
    id serial primary key not null,
    idutilisateur int references utilisateur(id),
    montant numeric,
    idregime int references regime(id),
    dateachat timestamp not null,
    remise numeric not null
);

create table sport(
    id serial primary key,
    nom varchar(50),
    apportjour numeric not null,
    photo varchar(255) not null,
    idobjectif int references objectif(id)
);

create table remise(
    id serial primary key,
    valeur numeric not null,
    dateremise date not null
);

create table utilisateur_gold(
    id serial primary key,
    idutilisateur int references utilisateur(id),
    date_gold date not null
);