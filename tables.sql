CREATE TABLE users (
    id int NOT NULL AUTO_INCREMENT,
    name varchar(120) not null,
    email varchar(120) NOT NULL,
    password varchar(120) not null,
    PRIMARY KEY(id)
);

CREATE TABLE tracking (
    id int NOT NULL AUTO_INCREMENT,
    shipper_name VARCHAR(120) NOT NULL,
    shipper_address TEXT NOT NULL,
    receiver_name VARCHAR(120) NOT NULL,
    receiver_address TEXT NOT NULL,
    ship_date  VARCHAR(120) NOT NULL,
    delivery_date VARCHAR(120) NOT NULL,
    status VARCHAR(120) NOT NULL,
    weight VARCHAR(15),
    type VARCHAR(120),
    content TEXT,
    tracking_id VARCHAR(15) UNIQUE NOT NULL,
    PRIMARY KEY(id)
)

CRAETE TABLE tracking_history (
     id int NOT NULL AUTO_INCREMENT,
    tracking_id int NOT NULL,
    status VARCHAR(120) NOT NULL,
    date_created TIMESTAMP NOT NULL,
    PRIMARY KEY(id)
);

