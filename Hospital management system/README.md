# Hospital Management System

This is a Hospital Management System web application designed to streamline and manage the operations of a hospital. The system provides functionalities for managing patients, doctors, appointments, and other hospital-related activities. 

## Technologies Used

- **Front End:**
  - HTML
  - CSS
  - Bootstrap 5

- **Back End:**
  - PHP
  - MySQL

- **Local Web Server:**
  - XAMPP

## Features

- Patient registration and management
- Doctor profiles and scheduling
- Appointment booking and tracking
- Medical records management
- User authentication and role-based access control

## Installation and Setup

1. **Clone the Repository:**
    ```bash
    git clone https://github.com/codekarimi/PHP_PROJECT.git
    cd hospital-management-system
    ```

2. **Set Up XAMPP:**
    - Download and install [XAMPP](https://www.apachefriends.org/index.html).
    - Start the Apache and MySQL modules from the XAMPP Control Panel.

3. **Database Configuration:**
    - Create a new database in MySQL (e.g., `hms`).
    - Import the database schema from the `database/hospital_db.sql` file.

4. **Update Database Connection:**
    - Open the `connection.php` file and update the database connection settings:
      ```php
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "hms";
      ?>
      ```

5. **Run the Application:**
    - Place the project folder in the `htdocs` directory of your XAMPP installation.
    - Open your web browser and navigate to `http://localhost/hospital-management-system`.

## Usage

- Register as a new user (patient, doctor, or admin).
- Log in with your credentials.
- Access and manage different features based on your role.

## Contributing

Contributions are welcome! Please fork this repository and submit pull requests with detailed descriptions of your changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
