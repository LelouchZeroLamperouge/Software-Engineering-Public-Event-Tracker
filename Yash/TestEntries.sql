INSERT INTO USERS (F_NAME, L_NAME, EMAIL, PASSWORD, ORGANIZATION, ADMIN, NOTIFICATIONS)
VALUES 
('John', 'Doe', 'john.doe@example.com', 'password123', 1, 0, 1),
('Jane', 'Smith', 'jane.smith@example.com', 'password456', 0, 1, 1),
('Alice', 'Johnson', 'alice.j@example.com', 'alicePass789', 1, 0, 0),
('Bob', 'Williams', 'bob.williams@example.com', 'bobSecure456', 0, 0, 1),
('Charlie', 'Brown', 'charlie.brown@example.com', 'charlieStrongPass', 1, 1, 0);

INSERT INTO STATUS (STATUS_DESCR)
VALUES
('Not Going'),
('Interested'),
('Going');

INSERT INTO CATEGORIES (CATEGORY_NAME)
VALUES
('Sports'),
('Quilting'),
('Hiking');

INSERT INTO EVENTS (EVENT_NAME, EVENT_DESCR, STREET_ADD,CITY,ZIPCODE,CREATOR,CATEGORY,DATETIME,WEBSITE)
VALUES 
('Arkansas Tech Conference', 'A technology conference for developers in Arkansas.', '546', 'LR', 71937, 1, 1, '2024-10-15 09:00:00', 'https://arktechconf.com'),
('Little Rock Food Festival', 'Annual food festival showcasing local Arkansas cuisine.','546', 'LR', 72454, 1, 1, '2024-11-20 12:00:00', 'https://littlerockfoodfest.com'),
('Arkansas Startup Expo', 'An event for showcasing Arkansas-based startups.', '546', 'LR', 72616, 1, 1,'2024-12-05 10:30:00', 'https://arkstartup.com'),
('Fayetteville Music Fest', 'Live music event featuring local bands in Fayetteville, Arkansas.', '546', 'LR', 72038, 1, 1, '2024-09-30 18:00:00', 'https://faymusicfest.com'),
('Arkansas Hiking Meetup', 'Group hiking event at Petit Jean State Park in Arkansas.', '546', 'LR', 72051, 1, 1, '2024-10-08 08:00:00', 'https://arkhike.com');

INSERT INTO EVENT_STATUS (USER_ID, EVENT_ID, STATUS_ID)
VALUES
(1,1,1),
(2,1,3),
(2,2,2);
