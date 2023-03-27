CREATE TABLE IF NOT EXISTS up_tasks_task
(
	ID INT NOT NULL AUTO_INCREMENT,
	NAME VARCHAR(255) NOT NULL,
	RESPONSIBLE_ID INT NOT NULL,
	PRIORITY_ID INT NOT NULL,
	STATUS_ID INT NOT NULL,
	PRIMARY KEY(ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_responsible
(
	ID INT NOT NULL AUTO_INCREMENT,
	NAME VARCHAR(255) NOT NULL,
	PRIMARY KEY(ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_priority
(
	ID INT NOT NULL AUTO_INCREMENT,
	NAME VARCHAR(60) NOT NULL,
	PRIMARY KEY(ID)
);

CREATE TABLE IF NOT EXISTS up_tasks_status
(
	ID INT NOT NULL AUTO_INCREMENT,
	NAME VARCHAR(60) NOT NULL,
	PRIMARY KEY(ID)
);

INSERT INTO up_tasks_task (NAME, RESPONSIBLE_ID, PRIORITY_ID, STATUS_ID)
VALUES
    ('Clone repository', 1, 3, 2),
    ('Install module using admin panel', 3, 2, 1),
    ('Create database', 5, 3, 3),
    ('Create symlinks', 4, 1, 1);

INSERT INTO up_tasks_responsible (NAME)
VALUES
	('Ivanov Ivan'),
	('Elena Pushkina'),
	('Nikita Ovechkin'),
	('Natalya Popova'),
	('Aleksandr Potapov');

INSERT INTO up_tasks_priority (NAME)
VALUES
    ('Low'),
    ('Medium'),
    ('High');

INSERT INTO up_tasks_status (NAME)
VALUES
    ('New'),
    ('In Progress'),
    ('Done');
