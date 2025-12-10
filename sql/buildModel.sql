CREATE SCHEMA IF NOT EXISTS Creator_Platform;
USE Creator_Platform;

CREATE TABLE IF NOT EXISTS Creator_Platform.Users(
    User_ID int PRIMARY KEY AUTO_INCREMENT,
    Username varchar(45) not null unique,
    User_Email varchar(45) not null unique,
    Password_Hash varchar(255) not null,
    Role enum('user','creator') not null DEFAULT 'user',
    Created_At DATETIME not null DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Creator_Platform.Creators(
    Creator_ID int PRIMARY KEY AUTO_INCREMENT, 
    User_ID int not null,
    Created_At DATETIME not null DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (User_ID) REFERENCES Creator_Platform.Users(User_ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Creator_Platform.Subscription_Tiers(
    Tier_ID int PRIMARY KEY AUTO_INCREMENT,
    Creator_ID int not null,
    Tier_Name varchar(45) not null,
    Price_Cents int not null,
    Details varchar(255),
    Subscriber_Count int null,
    Post_count int null,
    Created_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Creator_ID) REFERENCES Creator_Platform.Creators(Creator_ID) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS Creator_Platform.Posts(
    Post_ID int PRIMARY KEY AUTO_INCREMENT,
    Creator_ID int not null,
    Tier_ID int null,
    Title varchar(255) not null,
    Body text not null,
    Visibility ENUM('public','subscribers','tier') DEFAULT 'public',
    Created_At TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (Creator_ID) REFERENCES Creator_Platform.Creators(Creator_ID) ON DELETE CASCADE,
    FOREIGN KEY (Tier_ID) REFERENCES Creator_Platform.Subscription_Tiers(Tier_ID) ON DELETE SET NULL
);

