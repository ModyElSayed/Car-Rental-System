CREATE SCHEMA Car_Rental;

CREATE TABLE Car_Rental.Car
(
  Car_Id INT NOT NULL AUTO_INCREMENT,
  Brand VARCHAR(32) NOT NULL,
  Model VARCHAR(32) NOT NULL,
  Year YEAR NOT NULL,
  Plate_Id VARCHAR(32) NOT NULL,
  Price INT NOT NULL,
  Car_Status ENUM('Active', 'Out of Service') NOT NULL,
  Status_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

  PRIMARY KEY (Car_Id),
  UNIQUE (Plate_Id)
);

CREATE TABLE Car_Rental.Car_Color
(
  Car_Id INT NOT NULL,
  Color VARCHAR(32) NOT NULL,

  PRIMARY KEY (Color, Car_Id),
  FOREIGN KEY (Car_Id) REFERENCES Car(Car_Id)
);

CREATE TABLE Car_Rental.Account
(
  Email VARCHAR(255) NOT NULL,
  Password VARCHAR(255) NOT NULL,
  Registration_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

  PRIMARY KEY (Email)
);

-- For test only to be able to remember the encrypted password
CREATE TABLE Car_Rental.Decrypted_Account
(
  Email VARCHAR(255) NOT NULL,
  Password VARCHAR(255) NOT NULL,
  Registration_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

  PRIMARY KEY (Email)
);

CREATE TABLE Car_Rental.Customer
(
  Cus_Id INT NOT NULL AUTO_INCREMENT,
  First VARCHAR(32) NOT NULL,
  Last VARCHAR(32) NOT NULL,
  SSN CHAR(9) NOT NULL,
  DOB DATETIME NOT NULL,
  Email VARCHAR(255) NOT NULL,

  PRIMARY KEY (Cus_Id),
  FOREIGN KEY (Email) REFERENCES Account(Email),
  UNIQUE (SSN)
);

CREATE TABLE Car_Rental.Address
(
  Zip CHAR(5) NOT NULL,
  Area VARCHAR(255) NOT NULL,
  City VARCHAR(32) NOT NULL,
  Country VARCHAR(32) NOT NULL,

  PRIMARY KEY (Zip)
);

CREATE TABLE Car_Rental.Cus_Address
(
  Cus_Id INT NOT NULL,
  Zip CHAR(5) NOT NULL,

  PRIMARY KEY (Cus_Id, Zip),
  FOREIGN KEY (Cus_Id) REFERENCES Customer(Cus_Id),
  FOREIGN KEY (Zip) REFERENCES Address(Zip)
);

CREATE TABLE Car_Rental.Reservation
(
  Reserve_Id INT NOT NULL AUTO_INCREMENT,
  Car_Id INT NOT NULL,
  Cus_Id INT NOT NULL,
  Payment_Type ENUM('Cash', 'Online') NOT NULL,
  Pickup_Location VARCHAR(32) NOT NULL,
  Reservation_Date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),

  PRIMARY KEY (Car_Id, Cus_Id, Reservation_Date),
  FOREIGN KEY (Car_Id) REFERENCES Car(Car_Id),
  FOREIGN KEY (Cus_Id) REFERENCES Customer(Cus_Id),
  UNIQUE (Reserve_Id)
);

CREATE TABLE Car_Rental.Online_Payment
(
  Card_Number VARCHAR(20) NOT NULL,
  CVV INT NOT NULL,
  Cus_Id INT NOT NULL,

  PRIMARY KEY (Card_Number),
  FOREIGN KEY (Cus_Id) REFERENCES Customer(Cus_Id)
);

CREATE TABLE Car_Rental.Office
(
  Country_Code CHAR(2) NOT NULL,
  Country_Name VARCHAR(64) NOT NULL,

  PRIMARY KEY (Country_Code)
);
