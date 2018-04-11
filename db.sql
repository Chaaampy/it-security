
CREATE TABLE user (
id 	int(6) NOT NULL auto_increment,
name VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
PRIMARY KEY  (id)
);

CREATE TABLE message (
id 	int(6) NOT NULL auto_increment,
idUser 	int(6) NOT NULL,
date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
message text NOT NULL,
PRIMARY KEY  (id),
FOREIGN KEY (idUser) REFERENCES user (id)
);

insert into user(name, password, email) values ('test', '4a7d1ed414474e4033ac29ccb8653d9b', 'test@gmail.com');
insert into user(name, password, email) values ('test01', '4a7d1ed414474e4033ac29ccb8653d9b', 'test@gmail.com');
