create database home_music;
use home_music;
CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR( 32 ) NOT NULL,
	password VARCHAR( 32 ) NOT NULL,
	email VARCHAR( 100 ) NOT NULL,
	online_ INT( 20 ) NOT NULL,
	active INT( 1 ) NOT NULL,
	created_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE song_collection (
	file_name VARCHAR(128) NOT NULL,
	song_name VARCHAR(32),
	album VARCHAR(32),
	artist VARCHAR(32),
	username VARCHAR(32) NOT NULL,
	public BOOLEAN,
	PRIMARY KEY(file_name, username)
);
INSERT INTO song_collection values ('Dope.mp3','Dope','The Army Shield','BTS','admin',true);
INSERT INTO song_collection values ('Egotistic.mp3','Egotistic','Mamamoo The Collection','Mamamoo','admin',true);
INSERT INTO song_collection values ('HYLT.mp3','How you like that','How you like that (sigle album)','Black Pink','admin',true);
INSERT INTO song_collection values ('Kokobop.mp3','Kokobop','WeedExo','EXO','admin',true);
SELECt * from song_collection;
CREATE TABLE feedback (
	unix_time INT(11) NOT NULL,
	dates TEXT NOT NULL,
	username TEXT,
	email TEXT,
	rating INT(11) NOT NULL,
	nav_ease TEXT NOT NULL,
	comments TEXT
);