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
('Wolff', 'Alex', 'https://www.themoviedb.org/person/934281-alex-wolff/');

-- 3. FILMS (13)
INSERT INTO films (titre, description, annee, categorie, prix, image_url, realisateur_id, trailer_id) VALUES
('Zootopie 2', 'Suite des aventures de Judy Hopps et Nick Wilde dans la métropole animale.', 2025, 'Action', 12.99, 'https://bohmtheatre.org/wp-content/uploads/2025/09/2ootopia.jpg', 1, '5AwtptT8X8k'),
('Greenland 2 : Migration', 'La famille Garrity doit survivre après l\'apocalypse causée par une comète.', 2026, 'Action', 14.99, 'https://bohmtheatre.org/wp-content/uploads/2025/09/2ootopia.jpg', 2, 'hiD3zk0ZRFg'),
('Sinners', 'Un thriller gothique avec des éléments surnaturels terrifiants.', 2025, 'Drame', 13.99, 'https://media.services.cinergy.ch/media/box1600/db66e0f2dc91230f2c48e921d59b261e62ed7dd5.jpg', 3, 'bKGxHflevuk'),
('La Femme de Ménage', 'Un thriller psychologique érotique plein de rebondissements.', 2025, 'Drame', 11.99, 'https://fr.web.img5.acsta.net/r_1920_1080/img/ed/a3/eda3bba832e22c79ea22117b058f84e5.jpg', 4, 'H6-M7G3eFdk'),
('Anaconda', 'Une comédie d\'action délirante avec un serpent géant.', 2025, 'Action', 10.99, 'https://fr.web.img6.acsta.net/r_1920_1080/img/20/af/20afc1b148d574dca07ec228be9ac869.jpg', 5, '_7gfE_pBN1E'),
('Une bataille après l\'autre', 'Un thriller d\'action intense avec des rebondissements constants.', 2025, 'Action', 13.99, 'https://fr.web.img2.acsta.net/r_1920_1080/img/61/0d/610dc2fcd83afe3717f771b889b979c2.jpg', 6, '0yXndop7g4Q'),
('Ella McCay', 'Une comédie dramatique touchante sur la rédemption.', 2025, 'Drame', 12.99, 'https://fr.web.img5.acsta.net/r_1920_1080/img/9a/07/9a07f6da3924c9f969ce7d91fa75e6db.jpg', 7, 'wuuqf7GK78M'),
('Send Help', 'Un film d\'horreur qui vous fera frissonner.', 2026, 'Action', 14.99, 'https://fr.web.img4.acsta.net/r_1920_1080/img/2a/2c/2a2cebc69a11f9ce0da6eeec4ca36e03.jpg', 8, 'NbfutLKRqjQ'),
('L\'Art du faux', 'Un film d\'action sur le monde de la contrefaçon artistique.', 2025, 'Action', 11.99, 'https://fr.web.img6.acsta.net/r_1920_1080/img/3a/fe/3afec531e4a51fb10729d66d3c85ddfc.jpg', 9, 'KAXwdY3ei7c'),
('Kaguya, princesse cosmique', 'Un film d\'animation poétique inspiré du conte japonais.', 2026, 'Drame', 15.99, 'https://fr.web.img2.acsta.net/r_1920_1080/img/fe/26/fe26623803f8363e031662bf9e1eabfc.jpg', 10, 'monIY8lb8NE'),
('Reconnu coupable', 'Un thriller judiciaire captivant plein de suspense.', 2026, 'Drame', 13.99, 'https://fr.web.img3.acsta.net/r_1920_1080/img/7d/cb/7dcb8416ab4e8fd4ff6eeaed758c6004.jpg', 11, 'O7ocCijaVQg'),
('Marty Supreme', 'Un drame sportif inspirant sur le tennis de table.', 2025, 'Drame', 12.99, 'https://fr.web.img6.acsta.net/r_1920_1080/img/83/18/8318c06373acd968023aa5afab9c2ae6.jpg', 12, 'wgTP_92-I38'),
('The Rip', 'Un thriller haletant qui vous tiendra en haleine jusqu\'à la fin.', 2026, 'Action', 14.99, 'https://fr.web.img6.acsta.net/r_1920_1080/img/23/1c/231ca583fb55f34f0d1ddcd61db4d29f.jpg', 13, 'OMeOauwYjRs'),
('Shelter', 'Un thriller psychologique intense où un père de famille doit protéger sa famille dans un abri antiatomique.', 2026, 'Action', 13.99, 'https://fr.web.img5.acsta.net/r_1920_1080/img/3e/4f/3e4fe2c00bd384cd5d3eba322b138ae7.jpg', 14, 'NARdg5Qz3zY'),
('Hamnet', 'Un drame historique poignant sur la vie de Shakespeare et la perte de son fils.', 2025, 'Drame', 14.99, 'https://fr.web.img4.acsta.net/r_1920_1080/img/9a/f5/9af5f87b39938fec50f86c32c3d31b69.jpg', 15, 'mW3UUp5qI2A'),
('Le Temple des Morts', 'Un film d\'horreur terrifiant dans un temple abandonné hanté par des esprits.', 2025, 'Action', 12.99, 'https://fr.web.img6.acsta.net/r_1920_1080/img/33/26/332662d4df957ab5dbe5b9e1f65f4836.jpg', 16, 'V5PZ8eSMqTY'),
('Retour à Silent Hill', 'Suite tant attendue du film culte d\'horreur psychologique Silent Hill.', 2026, 'Action', 15.99, 'https://fr.web.img2.acsta.net/r_1920_1080/img/8d/77/8d77972cf196197c8147224fe58b8a34.jpg', 17, 'rSVfWoeTFaI'),
('Nuremberg', 'Un drame historique sur les procès de Nuremberg après la Seconde Guerre mondiale.', 2025, 'Drame', 13.99, 'https://fr.web.img3.acsta.net/r_1920_1080/img/94/4a/944af0dc409db6ca8232363444dbf852.jpg', 18, 'A7ZUQRHlJnk'),
('Dead of Winter', 'Un thriller glaçant où un groupe de survivants affronte le danger en plein hiver.', 2026, 'Action', 14.99, 'https://fr.web.img2.acsta.net/r_1920_1080/img/33/f2/33f25f1f138d5050c5fd982ee473701b.jpg', 19, 'dplEwZt2Ucg'),
('Vie Privée', 'Un drame intimiste sur les secrets et mensonges d\'une famille bourgeoise.', 2025, 'Drame', 11.99, 'https://fr.web.img5.acsta.net/r_1920_1080/img/3a/9d/3a9d3503d9ccc1fec7fbdc4bf2934da7.jpg', 20, 'XNU9OjgNLWE');

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
