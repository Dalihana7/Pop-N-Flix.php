CREATE USER 'imdb_user'@'localhost' IDENTIFIED BY '';
GRANT ALL PRIVILEGES ON imdb_movies.* TO 'imdb_user'@'localhost';
FLUSH PRIVILEGES;

-- INSERTION COMPLÈTE DES DONNÉES

-- 1. RÉALISATEURS (13)
INSERT INTO realisateurs (nom, bio, photo_url) VALUES
('Byron Howard', 'Réalisateur américain connu pour Zootopia et Raiponce', 'https://www.themoviedb.org/person/76595-byron-howard/150'),
('Ric Roman Waugh', 'Réalisateur spécialisé dans les films d\'action et survival', 'https://www.themoviedb.org/person/76422-ric-roman-waugh/150'),
('Ryan Coogler', 'Réalisateur oscarisé de Black Panther et Creed', 'https://www.themoviedb.org/person/1056121-ryan-coogler/150'),
('Park Chan-wook', 'Maître du thriller psychologique coréen', 'https://www.themoviedb.org/person/10099/150'),
('Tom Gormican', 'Réalisateur américain de comédies d\'action', 'https://www.themoviedb.org/person/1211000-tom-gormican/150'),
('James Mangold', 'Réalisateur de Logan et Walk the Line', 'https://www.themoviedb.org/person/366-james-mangold/150'),
('Greta Gerwig', 'Réalisatrice oscarisée de Lady Bird et Barbie', 'https://www.themoviedb.org/person/45400-greta-gerwig/150'),
('Mike Flanagan', 'Maître de l\'horreur moderne', 'https://www.themoviedb.org/person/551463-mike-flanagan/150'),
('David Yates', 'Réalisateur de la saga Harry Potter', 'https://www.themoviedb.org/person/11343-david-yates/150'),
('Isao Takahata', 'Légendaire réalisateur du Studio Ghibli', 'https://www.themoviedb.org/person/628/150'),
('Antoine Fuqua', 'Réalisateur de Training Day et The Equalizer', 'https://www.themoviedb.org/person/20907-antoine-fuqua/150'),
('Josh Safdie', 'Co-réalisateur de Uncut Gems', 'https://www.themoviedb.org/person/129561-josh-safdie/150'),
('Ari Aster', 'Réalisateur culte d\'Hereditary et Midsommar', 'https://www.themoviedb.org/person/1145520-ari-aster/150');

-- 2. ACTEURS (26)
INSERT INTO acteurs (nom, prenom, photo_url) VALUES
('Bateman', 'Jason', 'https://www.themoviedb.org/person/23532-jason-bateman.com/150'),
('Goodwin', 'Ginnifer', 'https://www.themoviedb.org/person/417-ginnifer-goodwin/150'),
('Butler', 'Gerard', 'https://www.themoviedb.org/person/17276-gerard-butler/150'),
('Baccarin', 'Morena', 'https://www.themoviedb.org/person/54882-morena-baccarin/150'),
('Jordan', 'Michael B.', 'https://www.themoviedb.org/person/135651-michael-b-jordan/150'),
('Shahidi', 'Yara', 'https://www.themoviedb.org/person/118372-yara-shahidi/150'),
('Choi', 'Woo-shik', 'https://www.themoviedb.org/person/1255881/150'),
('Park', 'So-dam', 'https://www.themoviedb.org/person/1442583/150'),
('Lopez', 'Jennifer', 'https://www.themoviedb.org/person/16866-jennifer-lopez/150'),
('Quaid', 'Jack', 'https://www.themoviedb.org/person/1030513-jack-quaid/150'),
('Ronan', 'Saoirse', 'https://www.themoviedb.org/person/36592-saoirse-ronan/150'),
('Chalamet', 'Timothée', 'https://www.themoviedb.org/person/1190668-timothee-chalamet/150'),
('Robbie', 'Margot', 'https://www.themoviedb.org/person/1373737-florence-pugh/150'),
('Pugh', 'Florence', 'https://www.themoviedb.org/person/1373737-florence-pugh/150'),
('Gugino', 'Carla', 'https://www.themoviedb.org/person/17832-carla-gugino/150'),
('Greenwood', 'Bruce', 'https://www.themoviedb.org/person/21089-bruce-greenwood/150'),
('Redmayne', 'Eddie', 'https://www.themoviedb.org/person/37632-eddie-redmayne150'),
('Watson', 'Emma', 'https://www.themoviedb.org/person/10990-emma-watson/150'),
('Takahata', 'Aki', 'https://www.themoviedb.org/person/1333696-akira-takayama/150'),
('Takahashi', 'Kenichi', 'https://www.themoviedb.org/person/3394336-takahashi-kenichi/150'),
('Washington', 'Denzel', 'https://www.themoviedb.org/person/5292-denzel-washingtons/150'),
('Hawke', 'Ethan', 'https://www.themoviedb.org/person/569-ethan-hawke/150'),
('Sandler', 'Adam', 'https://www.themoviedb.org/person/19292-adam-sandler/150'),
('Fox', 'Julia', 'https://www.themoviedb.org/person/2371446-julia-fox/150'),
('Collette', 'Toni', 'https://www.themoviedb.org/person/3051-toni-collette/150'),
('Wolff', 'Alex', 'https://www.themoviedb.org/person/934281-alex-wolff/150');

-- 3. FILMS (13)
INSERT INTO films (titre, description, annee, categorie, prix, image_url, realisateur_id) VALUES
('Zootopie 2', 'Suite des aventures de Judy Hopps et Nick Wilde dans la métropole animale.', 2025, 'Animation', 12.99, 'https://www.themoviedb.org/movie/1084242-zootopia-2/300x450', 1),
('Greenland 2 : Migration', 'La famille Garrity doit survivre après l\'apocalypse causée par une comète.', 2026, 'Action', 14.99, 'https://www.themoviedb.org/movie/840464-greenland-2-migration/300x450', 2),
('Sinners', 'Un thriller gothique avec des éléments surnaturels terrifiants.', 2025, 'Drame', 13.99, 'https://www.themoviedb.org/movie/1233413-sinners/300x450', 3),
('La Femme de Ménage', 'Un thriller psychologique érotique plein de rebondissements.', 2025, 'Drame', 11.99, 'https://www.themoviedb.org/movie/1368166-the-housemaid/300x450', 4),
('Anaconda', 'Une comédie d\'action délirante avec un serpent géant.', 2025, 'Action', 10.99, 'https://www.themoviedb.org/movie/1234731-anaconda/300x450', 5),
('Une bataille après l\'autre', 'Un thriller d\'action intense avec des rebondissements constants.', 2025, 'Action', 13.99, 'https://www.themoviedb.org/movie/1054867-one-battle-after-another/300x450', 6),
('Ella McCay', 'Une comédie dramatique touchante sur la rédemption.', 2025, 'Drame', 12.99, 'https://www.themoviedb.org/movie/1206008-ella-mccay/300x450', 7),
('Send Help', 'Un film d\'horreur qui vous fera frissonner.', 2026, 'Horreur', 14.99, 'https://www.themoviedb.org/movie/1198994-send-help/300x450', 8),
('L\'Art du faux', 'Un film d\'action sur le monde de la contrefaçon artistique.', 2025, 'Action', 11.99, 'https://www.themoviedb.org/movie/1443762-il-falsario/300x450', 9),
('Kaguya, princesse cosmique', 'Un film d\'animation poétique inspiré du conte japonais.', 2026, 'Animation', 15.99, 'https://www.themoviedb.org/movie/1575337/300x450', 10),
('Reconnu coupable', 'Un thriller judiciaire captivant plein de suspense.', 2026, 'Drame', 13.99, 'https://www.themoviedb.org/movie/1236153-mercy/300x450', 11),
('Marty Supreme', 'Un drame sportif inspirant sur le tennis de table.', 2025, 'Drame', 12.99, 'https://www.themoviedb.org/movie/1317288-marty-supreme/300x450', 12),
('The Rip', 'Un thriller haletant qui vous tiendra en haleine jusqu\'à la fin.', 2026, 'Action', 14.99, 'https://www.themoviedb.org/movie/1306368-the-rip/300x450', 13);

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
