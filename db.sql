CREATE TABLE players (
    player_id INT NOT NULL AUTO_INCREMENT,
	player_name VARCHAR(255),
	player_phone VARCHAR(255),
	game_id INT NOT NULL,
	PRIMARY KEY (player_id)
);

CREATE TABLE users (
    user_id INT NOT NULL AUTO_INCREMENT,
    user_name VARCHAR(255),
	user_password VARCHAR(255),
	PRIMARY KEY (user_id)
);

CREATE TABLE games (
    game_id INT NOT NULL AUTO_INCREMENT,
    game_field VARCHAR(255),
    game_time TIME,
	game_date DATE,
	PRIMARY KEY (game_id)
);