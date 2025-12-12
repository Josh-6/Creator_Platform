# Creator_Platform
An online content platfrom where creators can post text, polls, photos, audio, and video media to their subscribed users.

---

## How to Run Project

1. Clone the repository
  ```bash
  https://github.com/Josh-6//Creator_Platform.git
  ```
2. Install XAMPP
  ```bash
  https://www.apachefriends.org/
  ```
Only need to install these components:
- Apache
- MySQL
- PHP
- phpMyAdmin

3. Find htdocs in XAMPP folder
- Windows → C:\xampp\htdocs\
- Mac → /Applications/XAMPP/htdocs/
- Linux → /opt/lampp/htdocs/
  
4. Move or copy Creator_Platform to htdocs
- Windows → C:\xampp\htdocs\Creator_Platform
- Mac → /Applications/XAMPP/htdocs/Creator_Platform
- Linux → /opt/lampp/htdocs/Creator_Platform

5. Open XAMPP Controll Panel
- start the "Apache" Module
- start the "MySQL" Module

6. Go to your browser and visit (May need to disable some setting to work on mac)
- (only the first time)
  ```bash
  http://localhost/Creator_Platform/sql/
  ```
  and choose 
  - DBSetup to build the tables
  - SampleData to populate the schema with data (Must for prototype)
  - Optionally clearTable to delete database

- Or if already set up go directly to:
  ```bash
  http://localhost/Creator_Platform/public/
  ```
# Authors
- Ayman Sadek 
- Joshua Barajas 
- Wonjun Kim
