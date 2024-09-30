INSERT INTO USERS (F_NAME, L_NAME, EMAIL, PASSWORD, ORGANIZATION, ADMIN, NOTIFICATIONS)
VALUES 
('John', 'Doe', 'john.doe@example.com', 'password123', TRUE, FALSE, TRUE),
('Jane', 'Smith', 'jane.smith@example.com', 'password456', FALSE, TRUE, TRUE),
('Alice', 'Johnson', 'alice.j@example.com', 'alicePass789', TRUE, FALSE, FALSE),
('Bob', 'Williams', 'bob.williams@example.com', 'bobSecure456', FALSE, FALSE, TRUE),
('Charlie', 'Brown', 'charlie.brown@example.com', 'charlieStrongPass', TRUE, TRUE, FALSE);

INSERT INTO EVENTS (EVENT_NAME, EVENT_DESCR, CREATOR, DATETIME, WEBSITE)
VALUES 
('Arkansas Tech Conference', 'A technology conference for developers in Arkansas.', 1, '2024-10-15 09:00:00', 'https://arktechconf.com'),
('Little Rock Food Festival', 'Annual food festival showcasing local Arkansas cuisine.', 2, '2024-11-20 12:00:00', 'https://littlerockfoodfest.com'),
('Arkansas Startup Expo', 'An event for showcasing Arkansas-based startups.', 3, '2024-12-05 10:30:00', 'https://arkstartup.com'),
('Fayetteville Music Fest', 'Live music event featuring local bands in Fayetteville, Arkansas.', 4, '2024-09-30 18:00:00', 'https://faymusicfest.com'),
('Arkansas Hiking Meetup', 'Group hiking event at Petit Jean State Park in Arkansas.', 5, '2024-10-08 08:00:00', 'https://arkhike.com');
