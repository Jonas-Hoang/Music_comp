CREATE DATABASE nguoi_dung;
CREATE TABLE tai_khoan(
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_name NVARCHAR(30) NOT null,
	pass NVARCHAR(30) not null,
    full_name nvarchar(50) not null,
    email varchar(40) not null
    );
INSERT INTO tai_khoan (user_name, pass, full_name, email) VALUES  ('admin','111','JonasHoang','jonas_hoang@gmail.com');
INSERT INTO tai_khoan (user_name, pass, full_name, email) VALUES  ('hoang','111','Kio Nguyen','kio_nguyen_@gmail.com')  ;   
INSERT INTO tai_khoan (user_name, pass, full_name, email) VALUES  ('huy','111','Hercules Phan','hercules_phan@gmail.com');
CREATE TABLE Album(
	albumID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,   
	album_name VARCHAR(200) NOT NULL ,
    singer_name VARCHAR(100) NOT NULL,
	image_name VARCHAR(500) NOT NULL 
	);
INSERT INTO Album (album_name, singer_name, image_name) VALUES ('Made', 'Big Bang', 'img/bbag.jpg');
INSERT INTO Album (album_name, singer_name, image_name) VALUES ('Cles2', 'StrayKid', 'img/st.jpg');
INSERT INTO Album (album_name, singer_name, image_name) VALUES ('JudgeMee', 'Mamamoo', 'img/mm.jpg');
INSERT INTO Album (album_name, singer_name, image_name) VALUES ('PreDebut', 'Niziu', 'img/niziu.jpg');
CREATE TABLE Song(
	songID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,   
	song_name VARCHAR(200) NOT NULL ,
    singer_name VARCHAR(100) NOT NULL,
	album_name VARCHAR(200) NOT NULL,
    file_song_name VARCHAR (500) NOT NULL
	);

