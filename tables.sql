DROP TABLE IF EXISTS booking;
DROP TABLE IF EXISTS user;

CREATE TABLE user
(
user_id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
username VARCHAR(20) NOT NULL,
user_level VARCHAR(30),
firstname VARCHAR(50) NOT NULL,
surname VARCHAR (30) NOT NULL,
address VARCHAR (100) NOT NULL,
postcode VARCHAR (10) NOT NULL,
tel_no VARCHAR (11),
email VARCHAR (30) NOT NULL,
password VARCHAR (20) NOT NULL
);


CREATE TABLE booking
(
booking_id INTEGER(10) PRIMARY KEY AUTO_INCREMENT,
user_id INTEGER(10) NOT NULL,
username VARCHAR(20) NOT NULL,
firstname VARCHAR(50) NOT NULL,
surname VARCHAR (30) NOT NULL,
destination_from VARCHAR(30) NOT NULL,
destination_to VARCHAR(30) NOT NULL,
day_and_date_from VARCHAR(50) NOT NULL,
return_day_and_date VARCHAR(50) NOT NULL,
adult_fare_no VARCHAR(5) NOT NULL,
two_under_fare_no VARCHAR(5),
three_ten_fare_no VARCHAR(5),
elvn_sxtn_fare_no VARCHAR(5),
booking_date VARCHAR(50),
FOREIGN KEY (user_id) REFERENCES user(user_id)
);