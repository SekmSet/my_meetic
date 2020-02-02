# CREATE BASE DE DONNEE MY_MEETIC
CREATE DATABASE if not exists my_meetic;

#CREATE TABLE utilisateur
CREATE TABLE my_meetic.`utilisateur` (
   `id` int(11) NOT NULL AUTO_INCREMENT,
   `prenom` varchar(500) NOT NULL,
   `nom` varchar(500) NOT NULL,
   `date_naissance` date NOT NULL,
   `mail` varchar(500) NOT NULL,
   `login` varchar(500) NOT NULL,
   `mdp` varchar(500) NOT NULL,
   `ville` varchar(500) NOT NULL,
   `code_postal` varchar(500) NOT NULL,
   `sexe` varchar(500) NOT NULL,
   `adress` varchar(500) DEFAULT NULL,
   `actif` int(11) NOT NULL DEFAULT 1,
   PRIMARY KEY (`id`)
);

#CREATE TABLE loisir
create table my_meetic.`loisir` (
    `id`int PRIMARY KEY  auto_increment,
    `nom_loisir` varchar(500) not null
);

#CREATE TABLE loisir
create table my_meetic.`user_loisir` (
     `id` int(11) NOT NULL AUTO_INCREMENT,
     `id_loisir` int(11) NOT NULL,
     `id_user` int(11) NOT NULL,
     `actif` int(11) NOT NULL DEFAULT 1,
     PRIMARY KEY (`id`)
);

#Ajout des loisirs 'de base' dans la table loisir
insert into my_meetic.loisir (nom_loisir) values ('equitation'),('lecture'),('cinema'),('jeux-video'),
                                                 ('informatique'),('cuisine'),('danse');


create unique index utilisateur_login_uindex
    on my_meetic.utilisateur (login);

create unique index utilisateur_mail_uindex
    on my_meetic.utilisateur (mail);

