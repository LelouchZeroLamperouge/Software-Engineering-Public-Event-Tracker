CREATE DATABASE EVENT_FINDER;

USE EVENT_FINDER;

CREATE USER 'student'@'localhost' IDENTIFIED BY 'UA123!';

GRANT ALL PRIVILEGES ON EVENT_FINDER.* TO 'student'@'localhost';

CREATE TABLE USERS (
    USER_ID INT PRIMARY KEY AUTO_INCREMENT,
    F_NAME VARCHAR(30),
    L_NAME VARCHAR(30),
    EMAIL VARCHAR(255),
    PASSWORD VARCHAR(255),
    ORGANIZATION BOOLEAN,
    ADMIN BOOLEAN,
    NOTIFICATIONS BOOLEAN
);

CREATE TABLE EVENTS (
    EVENT_ID INT PRIMARY KEY AUTO_INCREMENT,
    EVENT_NAME VARCHAR(30),
    EVENT_DESCR VARCHAR(255),
    STREET_ADD VARCHAR(255),
    CITY VARCHAR(30),
    ZIPCODE INT,
    CREATOR INT,
    CATEGORY INT,
    DATETIME DATETIME,
    WEBSITE VARCHAR(255),
    FOREIGN KEY (ZIPCODE) REFERENCES ZIPCODES(ZIPCODE),
    FOREIGN KEY (CREATOR) REFERENCES USERS(USER_ID),
    FOREIGN KEY (CATEGORY) REFERENCES CATEGORIES(CATEGORY_ID)
);

CREATE TABLE CATEGORIES(
    CATEGORY_ID INT PRIMARY KEY AUTO_INCREMENT,
    CATEGORY_NAME VARCHAR(30)
);

CREATE TABLE ZIPCODES(
    ZIPCODE INT PRIMARY KEY,
    LATITUDE FLOAT(10,6),
    LONGITUDE FLOAT(10,6)
);

CREATE TABLE STATUS (
    STATUS_ID INT PRIMARY KEY AUTO_INCREMENT,
    STATUS_DESCR VARCHAR(255)
);

CREATE TABLE EVENT_STATUS (
    USER_ID INT,
    EVENT_ID INT,
    STATUS_ID INT,
    PRIMARY KEY (USER_ID, EVENT_ID),  
    FOREIGN KEY (USER_ID) REFERENCES USERS(USER_ID),  
    FOREIGN KEY (EVENT_ID) REFERENCES EVENTS(EVENT_ID),  
    FOREIGN KEY (STATUS_ID) REFERENCES STATUS(STATUS_ID)  
);