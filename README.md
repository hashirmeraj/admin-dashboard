---

# Admin Dashboard for Online Quiz

This repository contains the source code for an Admin Dashboard for managing an online quiz website. The dashboard includes features for login, registration, category management, question management, and more.

## Features

- **Login Page**: Secure login for admins.
- **Register Page**: Register new admin users.
- **Dashboard**: Main interface for admin operations.
- **Category Management**: Add, edit, update, and delete quiz categories.
- **Question Management**: Add, edit, update, and delete quiz questions.
- **View Categories**: Show all categories.
- **View Questions**: Show all questions.
- **Additional Features**: Other functionalities required for managing an online quiz.

## Installation and Setup

### Prerequisites

- **XAMPP**: A local server environment to run PHP and MySQL.

### Steps

1. **Download and Install XAMPP**

   - [Download XAMPP](https://www.apachefriends.org/index.html) and follow the installation instructions for your operating system.

2. **Download the Project**

   - Clone or download this repository from GitHub: `https://github.com/hashirmeraj/admin-dashboard`.

3. **Set Up the Database**

   - Open XAMPP and start the Apache and MySQL services.
   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin/` in your web browser.
   - Create a new database named `admin_dashboard`.
   - Import the SQL file:
     1. Go to the `admin_dashboard` database in phpMyAdmin.
     2. Click on the `Import` tab.
     3. Choose the file `/database/admin-dashboard.sql` from the project directory.
     4. Click `Go` to import the database.

4. **Configure the Project**

   - Open the file `./particles/config.php` in a text editor.
   - Update the database configuration settings to match your local environment:
     ```php
     <?php
     // Database configuration
     define('DB_SERVER', 'localhost');
     define('DB_USERNAME', 'root');
     define('DB_PASSWORD', '');
     define('DB_DATABASE', 'admin_dashboard');

     // Create database connection
     $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

     // Check connection
     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
     }
     ?>
     ```

5. **Run the Project**

   - Move the project folder to the `htdocs` directory of your XAMPP installation (e.g., `C:\xampp\htdocs\admin-dashboard`).
   - Open your web browser and navigate to `http://localhost/admin-dashboard/`.

6. **Access the Dashboard**

   - Use the login page to access the admin dashboard with your admin credentials.

## Usage

- **Login Page**: Access the admin dashboard.
- **Register Page**: Register a new admin user.
- **Dashboard**: Manage quiz categories and questions.
- **Category Management**: Add, edit, update, and delete categories.
- **Question Management**: Add, edit, update, and delete questions.
- **View Categories and Questions**: View lists of all categories and questions.

## Contributing

If you’d like to contribute to this project, please fork the repository and submit a pull request with your changes.
