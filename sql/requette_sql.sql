# CREATE BASE DE DONNEE MY_MEETIC
CREATE DATABASE my_meetic;

#CREATE TABLE utilisateur
CREATE TABLE my_meetic.`utilisateur`
  ( `id` INT  PRIMARY KEY AUTO_INCREMENT,
    `prenom` VARCHAR(500) NOT NULL ,
    `nom` VARCHAR(500) NOT NULL ,
    `date_naissance` DATE NOT NULL ,
    `mail` VARCHAR(500) NOT NULL ,
    `login` VARCHAR(500) NOT NULL ,
    `mdp` VARCHAR(500) NOT NULL,
    `adress` VARCHAR(500) NOT NULL ,
    `code_postal` VARCHAR(500) NOT NULL ,
    `sexe` INT NOT NULL
  );

#CREATE TABLE loisir
create table my_meetic.`loisir` (
    `id`int PRIMARY KEY  auto_increment,
    `nom_loisir` varchar(500) not null
);

#CREATE TABLE loisir
create table my_meetic.`user_loisir` (
    `id`int PRIMARY KEY auto_increment,
    `id_loisir` int not null references my_meetic.loisir(id),
    `id_user` int not null references my_meetic.utilisateur(id)
);

# Ajouter la colonne adresse à la table utilisateur
alter table my_meetic.`utilisateur` add adress VARCHAR(500) NULL;

#Ajout des loisirs 'de base' dans la table loisir
insert into my_meetic.loisir (nom_loisir) values ('equitation'),('lecture'),('cinema'),('jeux-video'),
                                                 ('informatique'),('cuisine'),('danse');

# Ajout de la colonne actif a la table user_loisir
alter table user_loisir
    add actif int default 1 not null;

# Ajout de la colonne actif a la table utilisateur
alter table utilisateur
    add actif int default 1 not null;

