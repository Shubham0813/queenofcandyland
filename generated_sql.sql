CREATE DATABASE cake_queenofcandyland;

USE cake_queenofcandyland;

CREATE TABLE representatives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    contact VARCHAR(100) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    unit VARCHAR(100) NOT NULL,
    street VARCHAR(255) NOT NULL,
    city VARCHAR(255) NOT NULL,
    province VARCHAR(100) NOT NULL,
    country VARCHAR(255) NOT NULL,
    postal_code VARCHAR(10) NOT NULL,
    created DATETIME,
    modified DATETIME
);

CREATE TABLE vendors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    address_id INT NOT NULL,
    representative_id INT NOT NULL,
    FOREIGN KEY address_key(address_id) REFERENCES addresses(id),
    FOREIGN KEY representative_key(representative_id) REFERENCES representatives(id),
    created DATETIME,
    modified DATETIME
);

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(100) NOT NULL,
    quantity_on_hand INT NOT NULL,
    minimum_reorder_point INT NOT NULL,
    vendor_id INT NOT NULL,
    vendor_part_number VARCHAR(255) NOT NULL,
    store_part_number VARCHAR(255) NOT NULL,
    created DATETIME,
    modified DATETIME,

    FOREIGN KEY vendor_key(vendor_id) REFERENCES vendors(id)
);

CREATE TABLE orders (
   id INT AUTO_INCREMENT PRIMARY KEY, 
   timestamp DATETIME,
   tracking_link VARCHAR(60),
   tracking_phone_number VARCHAR(100),
   created DATETIME,
   modified DATETIME
);

CREATE TABLE items_orders (
 item_id INT NOT NULL,
 order_id INT NOT NULL,
 quantity INT,
 created DATETIME,
 modified DATETIME,

 PRIMARY KEY (item_id,order_id)
);

INSERT INTO addresses(unit, street, city, province, country, created, modified) VALUES ('11','199 Doon Village Road','Kitchener','Ontario','Canada', NOW(), NOW());

INSERT INTO representatives(first_name,last_name,contact,created,modified) VALUES ('Shubham','Sharma','123 123-1234', NOW(), NOW());

INSERT INTO vendors(name, address_id, representative_id, created, modified) VALUES('Gummy Bear Bulk Suppliers', 1, 1, NOW(), NOW());

INSERT INTO items(name,quantity_on_hand, minimum_reorder_point, vendor_id,vendor_part_number, store_part_number, created, modified) VALUES('Gummy Bears', 23, 10, 1,'G1', 'G1S1', NOW(), NOW());

INSERT INTO orders(timestamp, tracking_link, tracking_phone_number) VALUES(NOW(), 'https://fedexdelivery.track.com/?track_number=30djncnf98', '123-123-1234');

INSERT INTO items_orders(item_id,order_id,quantity) VALUES(1,1,1);