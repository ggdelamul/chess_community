use chess_community;
CREATE TABLE blacklist (
id int(11) auto_increment primary key,
ip varchar(255),
date_attempt timestamp
);
	ALTER TABLE blacklist 
    ADD navigateur varchar(250);