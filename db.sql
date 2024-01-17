DROP TABLE IF EXISTS LIBRARY;

DROP TABLE IF EXISTS PLATFORM;

DROP TABLE IF EXISTS GAME;

DROP TABLE IF EXISTS GAMER;

CREATE TABLE game (
    id_game int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name_game VARCHAR(128) NOT NULL,
    editor_game VARCHAR(128) NOT NULL,
    released_game DATE NOT NULL,
    description_game TEXT(256) NOT NULL,
    URL_cover_game VARCHAR(256) NOT NULL,
    URL_site_game VARCHAR(256) NOT NULL,
    created_at_game DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE gamer (
    id_gamer int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name_gamer VARCHAR(128) NOT NULL,
    surname_gamer VARCHAR(128) NOT NULL,
    email_gamer VARCHAR(128) NOT NULL,
    password_gamer VARCHAR(128) NOT NULL,
    created_at_gamer DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE library (
    id_game INT NOT NULL,
    id_gamer INT NOT NULL,
    number_hours_game INT DEFAULT 0,
    PRIMARY KEY (id_game, id_gamer),
    FOREIGN KEY (id_game) REFERENCES game (id_game),
    FOREIGN KEY (id_gamer) REFERENCES gamer (id_gamer)
);

CREATE TABLE platform (
    id_platform int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    id_game INT NOT NULL,
    name_platform VARCHAR(128) NOT NULL,
    FOREIGN KEY (id_game) REFERENCES game (id_game)
);

INSERT INTO gamer (name_gamer, surname_gamer, email_gamer, password_gamer)
VALUES
    (
        'Dupont',
        'Patrick',
        'patrick.dupont@example.com',
        '$2y$10$RVaayFUxxD5CALXzYQXEreO9cjMyBgQhtiYHc.nMpvHKIKshXKozO'
    );


INSERT INTO game (name_game, editor_game, released_game, description_game, URL_cover_game, URL_site_game)
VALUES
    (
        'Red Dead Redemption 2',
        'Rockstar Games',
        '2018-10-26',
        'Red Dead Redemption II, également abrégé RDRII ou RDR2, est un jeu vidéo d action-aventure et de western multiplateforme, développé et édité par Rockstar Games, sorti en octobre 2018 sur Playstation 4 et Xbox One, puis en novembre 2019 sur Windows et Stadia.',
        'https://assets.vg247.com/current//2018/05/red_dead_redemption_2_cover_art_1.jpg',
        'https://www.rockstargames.com/fr/reddeadredemption2'
    ),
    (
        'Red Dead Redemption',
        'Rockstar Games',
        '2010-05-18',
        'Red Dead Redemption est un jeu vidéo d action-aventure en monde ouvert développé par Rockstar San Diego et édité par Rockstar Games sur Xbox 360 et PlayStation 3. Il est commercialisé le 18 mai 2010 en Amérique du Nord, le 21 mai en Europe et en Australie.',
        'https://image.api.playstation.com/vulcan/ap/rnd/202307/3122/00bd08cf240ede27e4354d3fc7a5b867190df853940366ec.png',
        'https://www.rockstargames.com/fr/reddeadredemption'
    ),
    (
        'Zelda BOTW',
        'Nintendo EPD, Monolith Soft',
        '2017-03-03',
        'The Legend of Zelda: Breath of the Wild est un jeu d action-aventure développé par la division Nintendo EPD, assisté par Monolith Soft, et publié par Nintendo le 3 mars 2017 sur Nintendo Switch lors du lancement de la console, ainsi que sur Wii U dont il est le dernier jeu produit par Nintendo.',
        'https://static1.millenium.org/articles/2/37/89/62/@/1491585-wallpapersdencom-legend-of-zelda-breath-of-the-wild-art-1280x720-article_image_bd-1.jpg',
        'https://www.nintendo.fr/Jeux/Jeux-Nintendo-Switch/The-Legend-of-Zelda-Breath-of-the-Wild-1173609.html'
    ),
    (
        'GTA 5',
        'Rockstar Games',
        '2017-03-03',
        'Grand Theft Auto V est un jeu vidéo d action-aventure, développé par Rockstar North et édité par Rockstar Games. Il est sorti en 2013 sur PlayStation 3 et Xbox 360, en 2014 sur PlayStation 4 et Xbox One, en 2015 sur PC puis en 2022 sur PlayStation 5 et Xbox Series.',
        'https://image.jeuxvideo.com/medias-sm/163129/1631287693-8700-jaquette-avant.jpg',
        'https://www.rockstargames.com/fr/gta-v'
    );


INSERT INTO
    platform(id_game, name_platform)
VALUES
    (
        1,
        'PlayStation'
    ),
    (
        1,
        'Xbox'
    ),
    (
        1,
        'PC'
    ),
    (
        2,
        'PlayStation'
    ),
    (
        2,
        'Xbox'
    ),
    (
        2,
        'PC'
    ),
    (
        2,
        'Nintendo'
    ),
    (
        3,
        'Nintendo'
    ),
    (
        3,
        'PC'
    ),
    (
        4,
        'PlayStation'
    ),
    (
        4,
        'PC'
    ),
    (
        4,
        'Xbox'
    ),
    (
        4,
        'Nintendo'
    );