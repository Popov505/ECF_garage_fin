/* Create schema and all the tables - START */

/* Create schema */
CREATE SCHEMA IF NOT EXISTS v0ic827n58ynz0m0;
USE v0ic827n58ynz0m0;

/* Create table users */
CREATE TABLE IF NOT EXISTS users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(254) NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `roles` VARCHAR(40) NOT NULL
) ENGINE=INNODB;

/* Create table prestations */
CREATE TABLE IF NOT EXISTS prestations (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(100) NOT NULL,
  `message` TEXT(1000) NULL,
  image_name VARCHAR(100) NULL,
  image_size INT NULL,
  updated_at DATE NULL
) ENGINE=INNODB;

/* Create table opening_hours */
CREATE TABLE IF NOT EXISTS opening_hours (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  open_day VARCHAR(30) NOT NULL,
  open_hour VARCHAR(30) NOT NULL
) ENGINE=INNODB;

/* Create table contacts */
CREATE TABLE IF NOT EXISTS contacts (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  firstname VARCHAR(30) NOT NULL,
  lastname VARCHAR(30) NOT NULL,
  email VARCHAR(254) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  title VARCHAR(100) NOT NULL,
  `message` TEXT(1000) NOT NULL
) ENGINE=INNODB;

/* Create table opinions */
CREATE TABLE IF NOT EXISTS opinions (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  lastname VARCHAR(30) NOT NULL,
  commentary TEXT(1000) NOT NULL,
  grade INT NOT NULL,
  is_validated VARCHAR(30) NOT NULL
) ENGINE=INNODB;

/* Create table cars */
CREATE TABLE IF NOT EXISTS cars (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(30) NOT NULL,
  build_year INT NOT NULL,
  fuel VARCHAR(10) NOT NULL,
  kilometer INT NOT NULL,
  price INT NOT NULL,
  image_name VARCHAR(100) NULL,
  image_size INT NULL,
  updated_at DATE NULL
) ENGINE=INNODB;
/* Create schema and all the tables - END */


/* Fulfill the tables - START */

/* Fulfill the table users */
INSERT INTO users (id, email, `password`, `roles`) VALUES
  (uuid(), 'vincent.parrot@poudlard.com', "", '["ROLE_ADMIN"]'),
  (uuid(), 'ronald.weasley@poudlard.com', "", '["ROLE_EMPLOYE"]'),
  (uuid(), 'luna.lovegood@poudlard.com', "", '["ROLE_EMPLOYE"]'),
  (uuid(), 'hermione.granger@poudlard.com', "", '["ROLE_EMPLOYE"]');


/* Fulfill the table services */
INSERT INTO prestations (id, title, `message`, image_name) VALUES
  (NULL, 'Réparation carrosserie', "Notre équipe de professionnels est là pour réparer la carrosserie de votre véhicule et vous le rendre comme neuf.", 'car-body-illustration-sm-65d24cd7d8b87481370207.jpg' ),
  (NULL, 'Réparation mécanique', "Fort de 15 ans d'expérience dans la réparation automobile, V. Parrot et son équipe vous assure un service irréprochable.", 'mecanic-illustration-sm-65d24ce73d987370605457.jpg'),
  (NULL, 'Entretien', "Confiez l'entretien de votre véhicule à notre atelier pour une performance et une sécurité garanties.", 'maintenance-illustration-sm-65d24cf547d38048763825.jpg'),
  (NULL, "Véhicules d'occassion", "Trouvez votre prochain véhicule parmi une sélection de voitures contrôlées dans notre atelier.", 'sale-illustration-sm-65d24d8ad38e7997361651.jpg');


/* Fulfill the table opening_hours */
INSERT INTO opening_hours (id, open_day, open_hour) VALUES
  (NULL, 'Lundi-Vendredi :', '8h45-12h00 | 14h00-18h00'),
  (NULL, 'Samedi :', '8h45-12h00'),
  (NULL, 'Dimanche :', 'Fermé');


/* Fulfill the table contacts */

INSERT INTO contacts (id, firstname, lastname, email, phone, title, `message`) VALUES
  (NULL, 'Severus', 'Rogue', 'severus.rogue@poudlard.com', '06 01 02 03 04', 'Révision de ma 2CV', "Bonjour, je voudrais faire réviser ma 2CV (100 000km). Pouvez-vous m'envoyer un devis, svp? Merci" ),
  (NULL, 'Minerva', 'Mcgonagall', 'minerva.mcgonagall@poudlard.com', '06 05 06 07 08', 'Cadillac', "Salut. Vous la vendez combien la Cadillac 1964?"),
  (NULL, 'Albus', 'Dumbledore', 'albus.dumbledore@poudlard.com', '07 08 09 10 11', 'Véhicule à la vente', "Bonjour. J'ai une Mustang GTO 1973 en parfait état que j'aimerai vendre. Vous en proposeriez combien?");


/* Fulfill the table opinions */
INSERT INTO opinions (id, lastname, commentary, grade, is_validated) VALUES
  (NULL, 'Longdubas', "Ce garage est extraordinaire!!", 5, 'approved'),
  (NULL, 'Malfoy', "Pas mal mais un peu cher.", 3, 'approved'),
  (NULL, 'Voldemort', "Il reste une rayure sur ma voiture, vous êtes nuls", 1, 'toCheck');


/* Fulfill the table cars */
INSERT INTO cars (id, title, build_year, fuel, kilometer, price, image_name) VALUES
  (NULL, 'Citroen 2CV', 1978, 'SP98', 1250000, 3600, 'gunther-schneider-65d1ee79742de811332640.jpg'),
  (NULL, 'Cadillac', 1964, 'Diesel', 96400, 12500, 'noel-bauza-65d1ee8447284445927651.jpg'),
  (NULL, 'Fiat 500', 1996, 'SP98', 125000, 4800, 'noname-13-65d1ee8df0230893909372.jpg'),
  (NULL, 'Ferrari', 2017, 'SP95', 72500, 125500, 'oleksander-pyrohov-65d1ee96dc1e0677791166.jpg'),
  (NULL, 'Mercedes SLK', 2019, 'SP95', 1200, 105200, 'pexels-65d2121562d82221356419.jpg'),
  (NULL, 'Pontiac', 1962 , 'Diesel', 69400, 14500, 'wild-pixar-65d48829c0cac239926391.jpg'),
  (NULL, 'Mercedes', 2021, 'SP95', 4250, 98000, 'piro-65d48845e903d536537969.jpg'),
  (NULL, 'Corvette', 1983, 'SP95', 19200, 27600, 'angelic-cooke-65d4885f200dd023456872.jpg'),
  (NULL, 'Lamborghini', 2017, 'SP95', 4200, 219000, '18193486-65d488814eefb226451748.jpg'),
  (NULL, 'Audi', 2016, 'Diesel', 215400, 43000, 'piro-2-65d488ab949af383789033.jpg'),
  (NULL, 'Ford GT', 2012, 'SP95', 12000, 75000, 'wild-pixar-2-65d488c583fc4483130038.jpg'),
  (NULL, 'VW Transporter', 1979, 'Diesel', 1256320, 37500, 'pexels-2-65d488e063acf986272756.jpg');

/* Fulfill the tables - END */