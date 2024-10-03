INSERT INTO USERS (F_NAME, L_NAME, EMAIL, PASSWORD, ORGANIZATION, ADMIN, NOTIFICATIONS)
VALUES 
('John', 'Doe', 'john.doe@example.com', 'password123', 1, 0, 1),
('Jane', 'Smith', 'jane.smith@example.com', 'password456', 0, 1, 1),
('Alice', 'Johnson', 'alice.j@example.com', 'alicePass789', 1, 0, 0),
('Bob', 'Williams', 'bob.williams@example.com', 'bobSecure456', 0, 0, 1),
('Charlie', 'Brown', 'charlie.brown@example.com', 'charlieStrongPass', 1, 1, 0);

INSERT INTO EVENTS (EVENT_NAME, EVENT_DESCR, CREATOR, DATETIME, WEBSITE, CATEGORIES)
VALUES 
('Arkansas Tech Conference', 'A technology conference for developers in Arkansas.', 1, '2024-10-15 09:00:00', 'https://arktechconf.com', 1),
('Little Rock Food Festival', 'Annual food festival showcasing local Arkansas cuisine.', 2, '2024-11-20 12:00:00', 'https://littlerockfoodfest.com', 2),
('Arkansas Startup Expo', 'An event for showcasing Arkansas-based startups.', 3, '2024-12-05 10:30:00', 'https://arkstartup.com', 3),
('Fayetteville Music Fest', 'Live music event featuring local bands in Fayetteville, Arkansas.', 4, '2024-09-30 18:00:00', 'https://faymusicfest.com', 1),
('Arkansas Hiking Meetup', 'Group hiking event at Petit Jean State Park in Arkansas.', 5, '2024-10-08 08:00:00', 'https://arkhike.com', 2);

INSERT INTO STATUS (STAT_DESCR)
VALUES
('Not Going'),
('Interested'),
('Going');

INSERT INTO EVENT_STATUS (USER_ID, EVENT_ID, STATUS_ID)
VALUES
(1,1,1),
(2,1,3),
(2,2,2);

INSERT INTO CATEGORIES (CATEGORY_NAME)
VALUES
('Sports'),
('Quilting'),
('Hiking');
