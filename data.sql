INSERT INTO genders (gender_id, gender_ref)
VALUES (1, 'Male'), (2, 'Female'), (3, 'Non-binary');


INSERT INTO users (email, password, lastname, firstname, age, country, gender_id, bio)
VALUES 
('user1@example.com', 'password1', 'Smith', 'John', 28, 'United States', 1, 'I am a software engineer.'),
('user2@example.com', 'password2', 'Johnson', 'Emily', 32, 'Canada', 2, 'I love hiking and exploring new places.'),
('user3@example.com', 'password3', 'Garcia', 'David', 24, 'Mexico', 1, 'I am a student studying computer science.'),
('user4@example.com', 'password4', 'Lee', 'Karen', 31, 'South Korea', 2, 'I am a teacher who loves to travel.'),
('user5@example.com', 'password5', 'Nguyen', 'Hanh', 26, 'Vietnam', 2, 'I am a nurse and enjoy cooking.'),
('user6@example.com', 'password6', 'Wong', 'Chi', 29, 'Hong Kong', 1, 'I am a musician and play guitar.'),
('user7@example.com', 'password7', 'Chen', 'Wei', 30, 'China', 1, 'I am a doctor and love to help others.'),
('user8@example.com', 'password8', 'Taylor', 'Ashley', 27, 'Australia', 2, 'I am a graphic designer and enjoy art.'),
('user9@example.com', 'password9', 'Brown', 'Jacob', 23, 'New Zealand', 1, 'I am a fitness instructor and love to workout.'),
('user10@example.com', 'password10', 'Kim', 'Min', 25, 'South Korea', 3, 'I am a writer and enjoy reading and learning new things.');
