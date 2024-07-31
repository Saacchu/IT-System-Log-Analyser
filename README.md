# IT System Log Analyzer

This project is a centralized system for analyzing IT system logs for the Central Reserve Police Force (CRPF). The system allows administrators to log in, add IP addresses and associated system information, track IP addresses, and view the browser history of systems through a Python script.

## Table of Contents

- [Files Description](#files-description)
  - [PHP Files](#php-files)
  - [Python Files](#python-files)
  - [SQL File](#sql-file)
- [Installation and Setup](#installation-and-setup)
  - [Database Setup](#database-setup)
  - [Web Server Setup](#web-server-setup)
  - [Python Setup](#python-setup)
- [Usage](#usage)
  - [Login](#login)
  - [Add IP Address](#add-ip-address)
  - [Track IP Address](#track-ip-address)
  - [Logout](#logout)
- [Security](#security)
- [Contact](#contact)

## Files Description

### PHP Files

1. **addIPAddress.php**
    - Form to add a new IP address, system name, and address.
    - Includes a session check to ensure the user is logged in.
    - Uses Bootstrap for styling.

2. **addIPAddressSubmit.php**
    - Handles the form submission from `addIPAddress.php`.
    - Inserts the submitted data into the `systemips` table in the database.
    - Includes a session check to ensure the user is logged in.

3. **connect.php**
    - Establishes a connection to the MySQL database.

4. **demo.php**
    - Displays the browsing history of the systems.
    - Runs a Python script `hist.py` and outputs its results.
    - Automatically refreshes every 3 seconds.

5. **header.php**
    - Navigation bar with links to different pages.
    - Displays options to navigate to Home, Add IPAddress, Track IPAddress, and Logout.

6. **headtag.php**
    - Contains the head section of HTML with meta tags, CSS, and JavaScript includes.
    - Sets up the Bootstrap framework and custom styles.

7. **home.php**
    - Displays the home page with an introductory message about the project.
    - Includes a session check to ensure the user is logged in.

8. **index.php**
    - Login page for the administrator.
    - Contains a form for the admin to log in.

9. **logged.php**
    - Handles login form submission from `index.php`.
    - Checks the submitted credentials against the `admin` table in the database.
    - Starts a session and redirects to `home.php` if credentials are correct.

10. **logout.php**
    - Destroys the current session and redirects the user to the login page.

11. **trackIPAddress.php**
    - Displays a list of IP addresses and system names from the `systemips` table.
    - Provides links to view the browsing history for each IP address using `demo.php`.

### Python Files

1. **dd.py**
    - Connects to a MySQL database and fetches all rows from the `links` table.
    - Prints the fetched rows.

2. **hist.py**
    - Copies the Chrome browser history file.
    - Connects to the copied history file and fetches browsing data.
    - Outputs the data in an HTML table format.

### SQL File

1. **sih1408.sql**
    - SQL dump for setting up the database `sih1408`.
    - Contains table structures and initial data for `admin` and `systemips` tables.

## Installation and Setup

### Database Setup

1. Import the `sih1408.sql` file into your MySQL database to create the required tables and initial data.
2. Update the `connect.php` file with your database connection details.

### Web Server Setup

1. Place the PHP files in your web server's root directory.
2. Ensure your web server has PHP and MySQL extensions enabled.

### Python Setup

1. Ensure Python is installed on the server.
2. Install required Python packages (e.g., `mysql-connector-python`, `shutil`, etc.).

## Usage

### Login

1. Navigate to the login page (`index.php`) and enter the admin credentials to log in.
2. Default credentials are `admin` and `srgec@123`.

### Add IP Address

1. After logging in, navigate to the "Add IPAddress" page to add a new IP address, system name, and address.

### Track IP Address

1. Navigate to the "Track IPAddress" page to view a list of registered IP addresses.
2. Click on an IP address link to view the browsing history.

### Logout

1. Use the "Logout" button in the navigation bar to log out of the system.

## Security

- Ensure proper session handling to prevent unauthorized access.
- Consider encrypting sensitive data such as passwords in the database.

## Contact

For any issues or further information, please contact the project administrator.
