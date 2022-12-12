# Creates customer table for video store project

DROP TABLE IF EXISTS cust_info;
#@ _CREATE_TABLE_
CREATE TABLE cust_info
(
  last_name  VARCHAR(100) NOT NULL,
  first_name VARCHAR(100) NOT NULL,
  address VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL,
  phone VARCHAR(100)NOT NULL,
  cust_ID INT UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (cust_ID)
  
);
#@ _CREATE_TABLE_