create table search_applicant (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    license_number INT,
    gender VARCHAR(255),
    age INT,
    email VARCHAR(255),
    contact_number VARCHAR(255),
    address VARCHAR(255),
    added_by INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    modified_by INT,
    last_updated TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
 
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (1, 'Darsie' ,'Stoak', 2475456, 'Female', 45, 'dstoak0@amazonaws.com' , '017-793-7269', '91 Farragut Park', '2024-05-09 22:12:22');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (2, 'Poul', 'Corn', 4215837, 'Male', 32, 'pcorn1@cmu.edu', '182-661-1003', '0434 Bowman Trail', '2024-06-17 03:17:53');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (3, 'Jany','McGinley', 3579502, 'Female', 22, 'jmcginley2@usatoday.com', '921-255-4805', '0031 Charing Cross Lane', '2024-10-23 19:16:05');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (4, 'Franchot', 'Bleakley', 6663063, 'Male', 38, 'fbleakley3@senate.gov', '006-388-4006', '9 Lakewood Gardens Street', '2024-09-09 19:48:10');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (5, 'Kristel', 'Cobbald', 4544986, 'Female', 29, 'kcobbald4@constantcontact.com', '609-799-1729', '3025 Hoffman Lane', '2024-04-19 19:25:56');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (6, 'Dulciana', 'Nemchinov', 3604557, 'Female', 26, 'dnemchinov5@businessinsider.com', '061-014-5389', '2 Kenwood Center', '2024-02-22 02:38:49');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (7, 'Upton', 'Hemstead', 2662663, 'Male', 54, 'uhemstead6@house.gov', '672-323-4103', '56688 Northview Lane', '2024-09-18 22:49:52');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (8, 'Clemence', 'Perceval', 0394077, 'Female', 33, 'cperceval7@weather.com', '007-941-0591', '7716 Hoepker Center', '2024-07-24 22:34:56');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (9, 'Astrid', 'Mawd', 1467807, 'Female', 40, 'amawd8@cyberchimps.com', '753-831-4087','5115 Columbus Pass', '2024-01-25 22:26:12');
insert into search_applicant (id, first_name, last_name, license_number, gender, age, email, contact_number, address, date_added) values (10, 'Kelsey', 'Galton', 9826227, 'Non-binary', 32, 'kgalton9@independent.co.uk', '550-459-2023', '85964 Summerview Road', '2024-01-15 11:59:48');
 
 
CREATE TABLE user_accounts (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255),
    first_name VARCHAR(255),
    last_name VARCHAR(255),
    password TEXT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);