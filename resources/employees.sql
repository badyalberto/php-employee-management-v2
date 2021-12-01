DROP DATABASE IF EXISTS employees;

CREATE DATABASE IF NOT EXISTS employees;

USE employees;

CREATE TABLE user (
	id 					BIGINT UNSIGNED 	 	NOT NULL AUTO_INCREMENT,
	user_id		 	CHAR(36) 						NOT NULL DEFAULT (UUID()),
	username		VARCHAR(64)					NOT NULL,
	password		VARCHAR(64)					NOT NULL,
	CONSTRAINT pk_user 							PRIMARY KEY (id),
	CONSTRAINT uk_user_id 					UNIQUE (user_id),
	CONSTRAINT uk_username					UNIQUE (username)
);

CREATE TABLE employee (
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	employee_id CHAR(36) NOT NULL DEFAULT (UUID()),
	first_name VARCHAR(14) NOT NULL,
	last_name VARCHAR(16) NOT NULL,
	age TINYINT UNSIGNED NOT NULL,
	gender ENUM ('M', 'F') NOT NULL,
	email VARCHAR(256) NOT NULL,
	phone_number VARCHAR(16) NOT NULL,
	hire_date DATE NOT NULL DEFAULT (CURRENT_DATE),
	created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP),
	updated_at TIMESTAMP NULL,
	deleted_at TIMESTAMP NULL,
	CONSTRAINT pk_employee PRIMARY KEY (id),
	CONSTRAINT uk_employee_id UNIQUE (employee_id)
);

CREATE TABLE address (
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	address_id CHAR(36) NOT NULL DEFAULT (UUID()),
	employee_id BIGINT UNSIGNED NOT NULL,
	street VARCHAR(64) NOT NULL,
	city VARCHAR(64) NOT NULL,
	postal_code VARCHAR(16) NOT NULL,
	state VARCHAR(16) NOT NULL,
	created_at TIMESTAMP NOT NULL DEFAULT (CURRENT_TIMESTAMP),
	updated_at TIMESTAMP NULL,
	deleted_at TIMESTAMP NULL,
	CONSTRAINT pk_address PRIMARY KEY (id),
	CONSTRAINT uk_address_id UNIQUE (address_id),
	CONSTRAINT fk_address_employee FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE
);

CREATE TABLE avatar (
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	avatar_id CHAR(36) NOT NULL DEFAULT (UUID()),
	employee_id BIGINT UNSIGNED NOT NULL,
	src_url TEXT NOT NULL,
	CONSTRAINT pk_avatar PRIMARY KEY (id),
	CONSTRAINT uk_avatar_id UNIQUE (avatar_id),
	CONSTRAINT fk_avatar_employee FOREIGN KEY (employee_id) REFERENCES employee (id) ON DELETE CASCADE
);

INSERT INTO
	user (username, password)
VALUES
	(
		"admin",
		"$2y$10$nuh1LEwFt7Q2/wz9/CmTJO91stTBS4cRjiJYBY3sVCARnllI.wzBC"
	);

INSERT INTO
	employee (
		first_name,
		last_name,
		age,
		gender,
		email,
		phone_number
	)
VALUES
	(
		"Rack",
		"Lei",
		24,
		"M",
		"jackon@network.com",
		"7383627627"
	),
	(
		"John",
		"Doe",
		34,
		"M",
		"jhondoe@foo.com",
		"1283645645"
	),
	(
		"Leila",
		"Mills",
		29,
		"F",
		"mills@leila.com",
		"9983632461"
	),
	(
		"Richard",
		"Desmond",
		30,
		"M",
		"dismond@foo.com",
		"90876987654"
	),
	(
		"Susan",
		"Smith",
		28,
		"F",
		"susanmith@baz.com",
		"224355488976"
	),
	(
		"Brad",
		"Simpson",
		40,
		"M",
		"brad@foo.com",
		"6854634522"
	),
	(
		"Neil",
		"Walker",
		42,
		"M",
		"walkerneil@baz.com",
		"45372788192"
	),
	(
		"Robert",
		"Thomson",
		24,
		"M",
		"jackon@network.com",
		"91232876454"
	);

INSERT INTO
	address (employee_id, street, city, postal_code, state)
VALUES
	(1, "126", "San Jose", "394221", "CA"),
	(2, "89", "New York", "009889", "WA"),
	(3, "55", "San Diego", "098765", "CA"),
	(4, "90", "Salt lake city", "457320", "UT"),
	(5, "43", "Louisville", "445321", "KNT"),
	(6, "128", "Atlanta", "394221", "GEO"),
	(7, "1", "Nashville", "090143", "TN"),
	(8, "126", "New Orleans", "063281", "LU");