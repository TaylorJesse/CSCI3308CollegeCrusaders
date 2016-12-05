CREATE DATABASE Majors;
USE Majors;

CREATE TABLE Arts_and_Science(Ranking INT(255), Major char(255), DegreeType char(50), EarlyPay INT, MidPay INT);
CREATE TABLE Business(Ranking INT(255), Major char(255), DegreeType char(50), EarlyPay INT, MidPay INT);
CREATE TABLE Education(Ranking INT(255), Major char(255), DegreeType char(50), EarlyPay INT, MidPay INT);
CREATE TABLE Engineering(Ranking INT(255), Major char(255), DegreeType char(50), EarlyPay INT, MidPay INT);

LOAD DATA LOCAL INFILE 'AandS.txt' INTO TABLE Arts_and_Science LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'Business.txt' INTO TABLE Business LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'Education.txt' INTO TABLE Education LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'Engineering.txt' INTO TABLE Engineering LINES TERMINATED BY '\r';