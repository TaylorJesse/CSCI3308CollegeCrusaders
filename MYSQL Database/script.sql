CREATE DATABASE College_Majors;
USE College_Majors;

CREATE TABLE All_Majors(Ranking INT, DegreeType char(255), Major char(50), EarlyPay char(15), MidPay char(15));
CREATE TABLE Arts_and_Science(Ranking INT(255), DegreeType char(255), Major char(50), EarlyPay char(15), MidPay char(15));
CREATE TABLE Business(Ranking INT(255), DegreeType char(255), Major char(50), EarlyPay char(15), MidPay char(15));
CREATE TABLE Education(Ranking INT(255), DegreeType char(255), Major char(50), EarlyPay char(15), MidPay char(15));
CREATE TABLE Engineering(Ranking INT(255), DegreeType char(255), Major char(50), EarlyPay char(15), MidPay char(15));

LOAD DATA LOCAL INFILE 'All_Majors.txt' INTO TABLE All_Majors LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'AandS.txt' INTO TABLE Arts_and_Science LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'Business.txt' INTO TABLE Business LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'Education.txt' INTO TABLE Education LINES TERMINATED BY '\r';
LOAD DATA LOCAL INFILE 'Engineering.txt' INTO TABLE Engineering LINES TERMINATED BY '\r';