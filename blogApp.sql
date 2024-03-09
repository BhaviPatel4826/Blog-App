
DROP TABLE blogs;
DROP TABLE tags;

CREATE TABLE blogs (
    id int(10) NOT NULL AUTO_INCREMENT,
    tag_id int(10) NOT NULL,
    title varchar(255) NOT NULL,
    slug varchar(255) NOT NULL,
    image_data varchar(100) DEFAULT NULL,
    body TEXT  NOT NULL,
    created_by varchar(255) NOT NULL,
    view int(10) DEFAULT 0,
    PRIMARY KEY (id),
    UNIQUE slug (slug)
    
);

CREATE TABLE tags (
    id int(10) NOT NULL AUTO_INCREMENT ,
    title varchar(255) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO tags (id, title) VALUES
(1, 'Nature'),
(2, 'Technology'),
(3, 'Travel');


-- Adding Data to Blog
INSERT INTO blogs (id, tag_id, title, slug, image_data, body, created_by) VALUES
(1,3, 'Exploring the Grand Canyon', 'exploring-the-grand-canyon', 'grand-canyon.jpeg', 'Exploring the Grand Canyon" is an exhilarating adventure that takes you through one of the most awe-inspiring natural wonders of the world. The Grand Canyon, located in Arizona, USA, is a vast canyon carved by the Colorado River over millions of years. Spanning over 270 miles long, up to 18 miles wide, and over a mile deep, the Grand Canyon offers breathtaking views and a glimpse into the Earth''s geological history.', 'John Doe'),
(2, 3, 'A Culinary Adventure in Italy', 'adventure-in-italy', 'Italy.jpg', 'Discover the flavors of Italy as we explore the country''s rich culinary traditions, from pasta and pizza to gelato and espresso.', 'John Doe'),
(3, 1, 'Hiking the Inca Trail to Machu Picchu', 'hiking-the-Inca-Trail', 'Hiking.jpg', 'Trek through the Andes Mountains and follow in the footsteps of the ancient Incas on this once-in-a-lifetime journey to the iconic Machu Picchu.', 'John Doe'),
(4, 3, 'Safari Adventures in Africa', 'safari-adventure-in-Africa', 'safari.jpg', 'Embark on a thrilling safari adventure in Africa, where you''ll have the chance to see the Big Five and experience the beauty of the African wilderness.', 'John Doe'),
(5, 1, 'Diving into the Great Barrier Reef', 'diving-into-the-great-barrier-reef', 'reef.jpeg', 'Dive into the crystal-clear waters of the Great Barrier Reef and discover a vibrant underwater world teeming with colorful marine life.', 'John Doe');