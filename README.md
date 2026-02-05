# Student Portal - Higher Education Management System

A comprehensive web-based portal for students in higher education institutions. This system provides students with access to their academic information, course schedules, grades, and profile management.

## Features

- **Student Authentication** - Secure login system for students
- **Dashboard** - Overview of academic performance and current courses
- **Course Management** - View enrolled courses and weekly schedules
- **Grade Tracking** - Access to grades and GPA calculation
- **Profile Management** - View and manage personal information
- **Responsive Design** - Modern, mobile-friendly interface using Bootstrap 5

## Technology Stack

- **Backend:** PHP 7.4+
- **Frontend:** HTML5, CSS3, Bootstrap 5, Bootstrap Icons
- **Database:** MySQL 5.7+ / MariaDB
- **Architecture:** MVC (Model-View-Controller) pattern

## Installation

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Apache/Nginx web server
- PHP PDO extension enabled

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/umarwirahadi/mahasiswa.git
   cd mahasiswa
   ```

2. **Configure the web server**
   
   For Apache, ensure mod_rewrite is enabled:
   ```bash
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   ```
   
   Point your document root to the repository directory.

3. **Set up the database**
   
   ```bash
   mysql -u root -p < database.sql
   ```
   
   Or manually import the `database.sql` file through phpMyAdmin or your preferred MySQL client.

4. **Configure database connection**
   
   Edit `application/config/database.php` with your database credentials:
   ```php
   return [
       'host' => 'localhost',
       'database' => 'mahasiswa_db',
       'username' => 'your_username',
       'password' => 'your_password',
       'charset' => 'utf8mb4'
   ];
   ```

5. **Set proper permissions**
   ```bash
   chmod -R 755 .
   chmod -R 777 application/logs
   ```

6. **Access the portal**
   
   Open your browser and navigate to:
   ```
   http://localhost/mahasiswa
   ```
   or your configured domain/subdomain.

## Demo Credentials

For testing purposes, use the following credentials:

- **Student ID:** `2024001`
- **Password:** `password123`

## Project Structure

```
mahasiswa/
├── application/
│   ├── config/          # Configuration files
│   │   ├── database.php # Database configuration
│   │   └── Database.php # Database helper class
│   ├── controllers/     # Controller classes
│   │   ├── Controller.php
│   │   ├── Home.php
│   │   ├── Auth.php
│   │   └── Students.php
│   ├── models/          # Model classes (future use)
│   ├── views/           # View templates
│   │   ├── layouts/     # Layout templates
│   │   ├── auth/        # Authentication views
│   │   └── students/    # Student portal views
│   └── logs/            # Application logs
├── assets/              # Static assets
│   ├── css/
│   ├── js/
│   └── images/
├── .htaccess           # Apache rewrite rules
├── index.php           # Application entry point
├── database.sql        # Database schema and demo data
└── README.md           # This file
```

## Usage

### For Students

1. **Login** - Access the portal using your student ID and password
2. **View Dashboard** - See an overview of your academic performance
3. **Check Courses** - View your enrolled courses and weekly schedule
4. **View Grades** - Access your grades and cumulative GPA
5. **Manage Profile** - View your personal and academic information

## Features Overview

### Dashboard
- Current GPA display
- Active semester information
- Enrolled courses count
- Quick access to all features
- Student information summary

### Course Management
- List of enrolled courses
- Course details (code, name, credits, instructor)
- Weekly schedule visualization
- Total credits calculation

### Grade Tracking
- Semester-wise grade display
- Individual course grades
- GPA calculation
- Academic performance summary
- Grade scale reference

### Profile Management
- Personal information display
- Contact details
- Academic information
- Account status

## Security Features

- Session-based authentication
- Password hashing (prepared for database integration)
- Protected routes requiring authentication
- SQL injection prevention using PDO prepared statements

## Development

### Adding New Features

1. **Controllers** - Add new controller classes in `application/controllers/`
2. **Views** - Create corresponding view files in `application/views/`
3. **Models** - Add model classes in `application/models/` for database operations
4. **Routes** - The routing is automatic based on URL pattern: `/controller/method`

### Database Operations

The Database helper class (`application/config/Database.php`) provides:
- `query($sql, $params)` - Execute a query
- `fetchAll($sql, $params)` - Fetch all rows
- `fetchOne($sql, $params)` - Fetch single row

## Future Enhancements

- [ ] Course enrollment functionality
- [ ] Online assignment submission
- [ ] Attendance tracking
- [ ] Fee payment integration
- [ ] Email notifications
- [ ] Document download (transcripts, certificates)
- [ ] Academic calendar
- [ ] Student-teacher messaging
- [ ] Mobile application

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License - see the LICENSE file for details.

## Support

For support, email support@university.edu or create an issue in the repository.

## Acknowledgments

- Bootstrap 5 for the responsive UI framework
- Bootstrap Icons for the icon set
- PHP community for excellent documentation
