INSERT INTO CATEGORIES(CATEGORY_NAME) VALUES
('sports'),
('gaming'),
('movies'),
('music'),
('hiking'),
('meetup'),
('studying'),
('pets'),
('meet up'),
('dancing'),
('reading'),
('cosplay'),
('sewing'),
('hiking'),
('sports'),
('quilting'),
('table top'),
('card game');

DELETE C1
FROM CATEGORIES C1
JOIN (
    SELECT CATEGORY_NAME, MIN(CATEGORY_ID) AS MinID
    FROM CATEGORIES
    GROUP BY CATEGORY_NAME
    HAVING COUNT(*) > 1
) C2
ON C1.CATEGORY_NAME = C2.CATEGORY_NAME
AND C1.CATEGORY_ID > C2.MinID;



