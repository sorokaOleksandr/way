CREATE DATABASE test_db CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE test_db;

CREATE TABLE product(
  id INT AUTO_INCREMENT,
  name         VARCHAR(30),
  price        FLOAT(5,2),
  description  TEXT,
  size         INT(4),
  quantity     INT(100),
  image        BLOB,
  PRIMARY KEY (id)
  )CHARACTER SET utf8 COLLATE utf8_unicode_ci;
  
INSERT INTO product(name,price,description,size,quantity) VALUES('школьная форма',160, 'text', 48, 8);
INSERT INTO product(name,price,description,size,quantity) VALUES('школьная форма',160, 'text', 52, 4);
INSERT INTO product(name,price,description,size,quantity) VALUES('рубашка',80, 'text', 54, 6);
INSERT INTO product(name,price,description,size,quantity) VALUES('рубашка',80, 'text', 68, 3);
INSERT INTO product(name,price,description,size,quantity) VALUES('кеды',300, 'text', 43, 9);































