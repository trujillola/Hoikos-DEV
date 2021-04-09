DROP DATABASE if exists Hoikos;
CREATE DATABASE Hoikos;
USE Hoikos;

CREATE TABLE Titre(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(100)
	);

CREATE TABLE Annonce(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	cat INT,
	prix FLOAT,
	descri VARCHAR(100),
	adresse VARCHAR(1000),
	email VARCHAR(100)
);

CREATE TABLE Photo(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	chemin VARCHAR(100),
	statut INT DEFAULT 0,
	idTitre INT,
	idAnnonce INT,
	FOREIGN KEY fk_titre(idTitre) REFERENCES Titre(id) ON DELETE CASCADE,
	FOREIGN KEY fk_annonce(idAnnonce) REFERENCES Annonce(id) ON DELETE CASCADE
	);

CREATE TABLE Atout(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	libelle VARCHAR(100)
	);

CREATE TABLE AvoirAtout(
	idAnnonce INT,
	idAtout INT,
	CONSTRAINT pk_AvoirAtout PRIMARY KEY (idAnnonce, idAtout),
	FOREIGN KEY fk_annonce(idAnnonce) REFERENCES Annonce(id) ON DELETE CASCADE,
	FOREIGN KEY fk_atout(idAtout) REFERENCES Atout(id) ON DELETE CASCADE
	);

CREATE TABLE Utilisateur(
	id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
	nom VARCHAR(100),
	prenom VARCHAR(100),
	civilite VARCHAR(100),
	email VARCHAR(100),
	codePostal INT(5),
	mdp VARCHAR(100),
	profil VARCHAR(100)
	);

CREATE TABLE Choisir(
	idAnnonce INT,
	idUtilisateur INT,
	CONSTRAINT pk_Choisir PRIMARY KEY (idAnnonce, idUtilisateur),
	FOREIGN KEY fk_Annonce(idAnnonce) REFERENCES Annonce(id) ON DELETE CASCADE,
	FOREIGN KEY fk_Utilisateur(idUtilisateur) REFERENCES Utilisateur(id) ON DELETE CASCADE
	);

/*---------------------------------------------------------------*/
/*---------------------- BDD appartements------------------------*/
/*---------------------------------------------------------------*/

/*Titres*/
INSERT INTO Titre (libelle) VALUES ("Appart1");
INSERT INTO Titre (libelle) VALUES ("Chambre");
INSERT INTO Titre (libelle) VALUES ("Pièce à vivre");
INSERT INTO Titre (libelle) VALUES ("Salle de bains");
INSERT INTO Titre (libelle) VALUES ("Balcon");

INSERT INTO Titre (libelle) VALUES ("Appart2");
INSERT INTO Titre (libelle) VALUES ("Sauna");
INSERT INTO Titre (libelle) VALUES ("Chambre 1");
INSERT INTO Titre (libelle) VALUES ("Chambre 2");
INSERT INTO Titre (libelle) VALUES ("Salle à manger");
INSERT INTO Titre (libelle) VALUES ("Garage");

INSERT INTO Titre (libelle) VALUES ("Appart3");
INSERT INTO Titre (libelle) VALUES ("Salle de bain");
INSERT INTO Titre (libelle) VALUES ("Entrée");
INSERT INTO Titre (libelle) VALUES ("Chambre lit double");
INSERT INTO Titre (libelle) VALUES ("Chambre enfants");
INSERT INTO Titre (libelle) VALUES ("Parking");

INSERT INTO Titre (libelle) VALUES ("Appart4");
INSERT INTO Titre (libelle) VALUES ("Immeuble");
INSERT INTO Titre (libelle) VALUES ("Vue balcon");
INSERT INTO Titre (libelle) VALUES ("Salon salle à manger");
INSERT INTO Titre (libelle) VALUES ("Chambre spacieuse");
INSERT INTO Titre (libelle) VALUES ("Bureau");

INSERT INTO Titre (libelle) VALUES ("Appart5");
INSERT INTO Titre (libelle) VALUES ("Vue globale");
INSERT INTO Titre (libelle) VALUES ("Rangements");
INSERT INTO Titre (libelle) VALUES ("Espace cuisine");
INSERT INTO Titre (libelle) VALUES ("Toilettes");
INSERT INTO Titre (libelle) VALUES ("Vue fenêtre");

/*Annonces*/
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (0,15000,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (0,17000,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (0,15800,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (0,20800,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (0,27180,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");

/*Photos*/
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("appart1.jpeg",1,1,1);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,1,1);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,3,1);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,4,1);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,5,1);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("appart2.jpeg",1,6,2);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,7,2);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,8,2);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,9,2);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,10,2);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,11,2);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("appart3.jpeg",1,12,3);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,13,3);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,2,3);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,15,3);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,16,3);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,17,3);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("appart4.jpeg",1,18,4);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,19,4);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,20,4);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,21,4);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,22,4);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,23,4);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("appart5.jpeg",1,24,5);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,25,5);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,26,5);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,27,5);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,28,5);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,29,5);

/*Atouts*/
INSERT INTO Atout (libelle) VALUES ("Grande superficie");
INSERT INTO Atout (libelle) VALUES ("Balcon");
INSERT INTO Atout (libelle) VALUES ("Espace ouvert");
INSERT INTO Atout (libelle) VALUES ("Bâtiment neuf");
INSERT INTO Atout (libelle) VALUES ("Place de parking");
INSERT INTO Atout (libelle) VALUES ("Baignoire");
INSERT INTO Atout (libelle) VALUES ("Cuisine fonctionnelle");
INSERT INTO Atout (libelle) VALUES ("Plaques chauffantes");
INSERT INTO Atout (libelle) VALUES ("Grand balcon");
INSERT INTO Atout (libelle) VALUES ("Tranquilité");
INSERT INTO Atout (libelle) VALUES ("Bon emplacement");
INSERT INTO Atout (libelle) VALUES ("Proche des transports en commun");
INSERT INTO Atout (libelle) VALUES ("Jardin");
INSERT INTO Atout (libelle) VALUES ("Pas de voisins");
INSERT INTO Atout (libelle) VALUES ("Orienté Est");
INSERT INTO Atout (libelle) VALUES ("Deux salles de bains");
INSERT INTO Atout (libelle) VALUES ("Proximité des magasins");
INSERT INTO Atout (libelle) VALUES ("Appartement duplex");
INSERT INTO Atout (libelle) VALUES ("Rez-de-chaussée");

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (1,1);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (1,2);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (1,3);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (1,4);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (2,5);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (2,6);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (2,7);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (2,8);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (3,9);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (3,10);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (3,11);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (3,12);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (4,13);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (4,14);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (5,15);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (5,16);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (5,17);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (5,18);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (5,19);

/*----------------------------------------------------------*/
/*---------------------- BDD Maisons------------------------*/
/*----------------------------------------------------------*/
/*Titres*/
INSERT INTO Titre (libelle) VALUES ("Maison1");
INSERT INTO Titre (libelle) VALUES ("Sauna");
INSERT INTO Titre (libelle) VALUES ("Garage");

INSERT INTO Titre (libelle) VALUES ("Maison2");
INSERT INTO Titre (libelle) VALUES ("Chambre enfant");

INSERT INTO Titre (libelle) VALUES ("Maison3");
INSERT INTO Titre (libelle) VALUES ("Vue extérieure");
INSERT INTO Titre (libelle) VALUES ("Jardin");

INSERT INTO Titre (libelle) VALUES ("Maison4");

INSERT INTO Titre (libelle) VALUES ("Maison5");
INSERT INTO Titre (libelle) VALUES ("Grenier");
INSERT INTO Titre (libelle) VALUES ("Bar");

/*Annonces*/
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (1,200000,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (1,340000,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (1,150800,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (1,290800,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (1,379180,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");

/*Photos*/
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("maison1.jpeg",1,30,6);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,1,6);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,3,6);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,4,6);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,5,6);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("maison2.jpeg",1,33,7);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,7,7);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,8,7);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,9,7);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,10,7);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,11,7);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("maison3.jpeg",1,35,8);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,13,8);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,14,8);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,15,8);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,16,8);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,17,8);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("maison4.jpeg",1,38,9);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,19,9);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,20,9);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,21,9);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,22,9);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,23,9);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("maison5.jpeg",1,39,10);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,25,10);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,26,10);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,27,10);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,28,10);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,29,10);

/*Atouts*/
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (6,1);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (6,2);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (6,3);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (6,4);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (7,5);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (7,6);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (7,7);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (7,8);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (8,9);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (8,10);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (8,11);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (8,12);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (9,13);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (9,14);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (10,15);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (10,16);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (10,17);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (10,18);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (10,19);

/*-----------------------------------------------------------*/
/*---------------------- BDD châteaux------------------------*/
/*-----------------------------------------------------------*/
/*Titres*/
INSERT INTO Titre (libelle) VALUES ("Chateau1");

INSERT INTO Titre (libelle) VALUES ("Chateau2");

INSERT INTO Titre (libelle) VALUES ("Château3");

INSERT INTO Titre (libelle) VALUES ("Château4");

INSERT INTO Titre (libelle) VALUES ("Château5");


/*Annonces*/
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (2,200000,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (2,340000,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (2,150800,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (2,290800,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");
INSERT INTO Annonce (cat,prix,descri,adresse,email) VALUES (2,379180,"Description","https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3474.349415793448!2d5.713979815780484!3d45.19323165950364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478af480be9664f1%3A0xfe0bab61b181fabd!2s1%20Rue%20de%20l&#39;Estoc%2C%2038000%20Grenoble!5e1!3m2!1sfr!2sfr!4v1615901323917!5m2!1sfr!2sfr","trujillola@eisti.eu");

/*Photos*/
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("chat1.jpeg",1,42,11);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,1,11);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,3,11);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,4,11);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,5,11);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("chat2.jpeg",1,43,12);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,7,12);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,8,12);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,9,12);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,10,12);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,11,12);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("chat3.jpeg",1,44,13);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,13,13);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,14,13);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,15,13);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,16,13);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,17,13);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("chat4.jpeg",1,45,14);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,19,14);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,20,14);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,21,14);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,22,14);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,23,14);

INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("chat5.jpeg",1,46,15);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bath.jpg",DEFAULT,25,15);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("bedroom.jpg",DEFAULT,26,15);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("kitchen.jpg",DEFAULT,27,15);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("living-room.jpg",DEFAULT,28,15);
INSERT INTO Photo (chemin,statut,idTitre,idAnnonce) VALUES ("office.jpg",DEFAULT,29,15);

/*Atouts*/
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (11,1);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (11,2);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (11,3);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (11,4);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (12,5);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (12,6);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (12,7);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (12,8);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (13,9);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (13,10);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (13,11);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (13,12);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (14,13);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (14,14);

INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (15,15);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (15,16);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (15,17);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (15,18);
INSERT INTO AvoirAtout (idAnnonce, idAtout) VALUES (15,19);



/*---------------------------------------------------------------*/
/*---------------------- BDD utilisateurs------------------------*/
/*---------------------------------------------------------------*/

INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("Trujillo","Laura","Madame","trujillola@eisti.eu",64000,"azerty","Acquéreur");
INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("Willy","Benoit","Monsieur","bens@eisti.eu",64000,"oui","Propriétaire");
INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("Cabrera","Cabrito","Monsieur","cabre@eisti.eu",64000,"1234","Acquéreur");
INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("Daguzan","Théo","Monsieur","to@eisti.eu",64000,"0000","Acquéreur");
INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("De bureau","Chaise","Madame","chair@eisti.eu",64000,"butt","Propriétaire");
INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("Basse","Table","Madame","tabasse@eisti.eu",64000,"non","Acquéreur");
INSERT INTO Utilisateur (nom,prenom,civilite,email,codePostal,mdp,profil) VALUES ("Druot","Bob","Monsieur","bob@eisti.eu",64000,"plouf","Propriétaire");


/*---------------------- BDD favoris------------------------*/
/*----------------------------------------------------------*/
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (1,1);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (1,4);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (1,3);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (1,5);

INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (2,1);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (2,3);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (2,5);

INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (3,1);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (3,2);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (3,3);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (3,4);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (3,5);

INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (5,1);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (5,3);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (5,4);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (5,5);

INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (6,3);

INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (7,1);
INSERT INTO Choisir (idUtilisateur,idAnnonce) VALUES (7,4);
