CREATE USER 'imdb_user'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON imdb_movies.* TO 'imdb_user'@'localhost';
FLUSH PRIVILEGES;
-- INSERTION COMPLÈTE DES DONNÉES

-- 1. RÉALISATEURS (13)
INSERT INTO realisateurs (nom, bio, photo_url) VALUES
('Byron Howard', 'Réalisateur américain connu pour Zootopia et Raiponce', 'https://via.placeholder.com/150'),
('Ric Roman Waugh', 'Réalisateur spécialisé dans les films d\'action et survival', 'https://via.placeholder.com/150'),
('Ryan Coogler', 'Réalisateur oscarisé de Black Panther et Creed', 'https://via.placeholder.com/150'),
('Park Chan-wook', 'Maître du thriller psychologique coréen', 'https://via.placeholder.com/150'),
('Tom Gormican', 'Réalisateur américain de comédies d\'action', 'https://via.placeholder.com/150'),
('James Mangold', 'Réalisateur de Logan et Walk the Line', 'https://via.placeholder.com/150'),
('Greta Gerwig', 'Réalisatrice oscarisée de Lady Bird et Barbie', 'https://via.placeholder.com/150'),
('Mike Flanagan', 'Maître de l\'horreur moderne', 'https://via.placeholder.com/150'),
('David Yates', 'Réalisateur de la saga Harry Potter', 'https://via.placeholder.com/150'),
('Isao Takahata', 'Légendaire réalisateur du Studio Ghibli', 'https://via.placeholder.com/150'),
('Antoine Fuqua', 'Réalisateur de Training Day et The Equalizer', 'https://via.placeholder.com/150'),
('Josh Safdie', 'Co-réalisateur de Uncut Gems', 'https://via.placeholder.com/150'),
('Ari Aster', 'Réalisateur culte d\'Hereditary et Midsommar', 'https://via.placeholder.com/150');

-- 2. ACTEURS (26)
INSERT INTO acteurs (nom, prenom, photo_url) VALUES
('Bateman', 'Jason', 'https://via.placeholder.com/150'),
('Goodwin', 'Ginnifer', 'https://via.placeholder.com/150'),
('Butler', 'Gerard', 'https://via.placeholder.com/150'),
('Baccarin', 'Morena', 'https://via.placeholder.com/150'),
('Jordan', 'Michael B.', 'https://via.placeholder.com/150'),
('Shahidi', 'Yara', 'https://via.placeholder.com/150'),
('Choi', 'Woo-shik', 'https://via.placeholder.com/150'),
('Park', 'So-dam', 'https://via.placeholder.com/150'),
('Lopez', 'Jennifer', 'https://via.placeholder.com/150'),
('Quaid', 'Jack', 'https://via.placeholder.com/150'),
('Ronan', 'Saoirse', 'https://via.placeholder.com/150'),
('Chalamet', 'Timothée', 'https://via.placeholder.com/150'),
('Robbie', 'Margot', 'https://via.placeholder.com/150'),
('Pugh', 'Florence', 'https://via.placeholder.com/150'),
('Gugino', 'Carla', 'https://via.placeholder.com/150'),
('Greenwood', 'Bruce', 'https://via.placeholder.com/150'),
('Redmayne', 'Eddie', 'https://via.placeholder.com/150'),
('Watson', 'Emma', 'https://via.placeholder.com/150'),
('Takahata', 'Aki', 'https://via.placeholder.com/150'),
('Takahashi', 'Kenichi', 'https://via.placeholder.com/150'),
('Washington', 'Denzel', 'https://via.placeholder.com/150'),
('Hawke', 'Ethan', 'https://via.placeholder.com/150'),
('Sandler', 'Adam', 'https://via.placeholder.com/150'),
('Fox', 'Julia', 'https://via.placeholder.com/150'),
('Collette', 'Toni', 'https://via.placeholder.com/150'),
('Wolff', 'Alex', 'https://via.placeholder.com/150');

-- 3. FILMS (13)
INSERT INTO films (titre, description, annee, categorie, prix, image_url, realisateur_id) VALUES
('Zootopie 2', 'Suite des aventures de Judy Hopps et Nick Wilde dans la métropole animale.', 2025, 'Animation', 12.99, 'https://via.placeholder.com/300x450', 1),
('Greenland 2 : Migration', 'La famille Garrity doit survivre après l\'apocalypse causée par une comète.', 2026, 'Action', 14.99, 'https://via.placeholder.com/300x450', 2),
('Sinners', 'Un thriller gothique avec des éléments surnaturels terrifiants.', 2025, 'Drame', 13.99, 'https://via.placeholder.com/300x450', 3),
('La Femme de Ménage', 'Un thriller psychologique érotique plein de rebondissements.', 2025, 'Drame', 11.99, 'https://via.placeholder.com/300x450', 4),
('Anaconda', 'Une comédie d\'action délirante avec un serpent géant.', 2025, 'Action', 10.99, 'https://via.placeholder.com/300x450', 5),
('Une bataille après l\'autre', 'Un thriller d\'action intense avec des rebondissements constants.', 2025, 'Action', 13.99, 'https://via.placeholder.com/300x450', 6),
('Elle McCay', 'Une comédie dramatique touchante sur la rédemption.', 2025, 'Drame', 12.99, 'https://via.placeholder.com/300x450', 7),
('Send Help', 'Un film d\'horreur qui vous fera frissonner.', 2026, 'Horreur', 14.99, 'https://via.placeholder.com/300x450', 8),
('L\Art du faux', 'Un film d\'action sur le monde de la contrefaçon artistique.', 2025, 'Action', 11.99, 'https://via.placeholder.com/300x450', 9),
('Kaguya, princesse cosmique', 'Un film d\'animation poétique inspiré du conte japonais.', 2026, 'Animation', 15.99, 'https://via.placeholder.com/300x450', 10),
('Reconnu coupable', 'Un thriller judiciaire captivant plein de suspense.', 2026, 'Drame', 13.99, 'https://via.placeholder.com/300x450', 11),
('Marty Supreme', 'Un drame sportif inspirant sur le tennis de table.', 2025, 'Drame', 12.99, 'https://via.placeholder.com/300x450', 12),
(The Rip', 'Un thriller haletant qui vous tiendra en haleine jusqu\'à la fin.', 2026, 'Action', 14.99, 'https://via.placeholder.com/300x450', 13);

-- 4. LIAISON FILMS-ACTEURS (26 relations)
INSERT INTO films_acteurs (film_id, acteur_id) VALUES
(1, 1), (1, 2),
(2, 3), (2, 4),
(3, 5), (3, 6),
(4, 7), (4, 8),
(5, 9), (5, 10),
(6, 11), (6, 12),
(7, 13), (7, 14),
(8, 15), (8, 16),
(9, 17), (9, 18),
(10, 19), (10, 20),
(11, 21), (11, 22),
(12, 23), (12, 24),
(13, 25), (13, 26);

-- Nombre de réalisateurs
SELECT COUNT(*) FROM realisateurs;

-- Nombre d'acteurs
SELECT COUNT(*) FROM acteurs;

-- Nombre de films
SELECT COUNT(*) FROM films;

-- Voir tous les films
SELECT * FROM films;