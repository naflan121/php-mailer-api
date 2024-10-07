# PHP Mailer API

A PHP API for sending backup status emails using [PHPMailer](https://github.com/PHPMailer/PHPMailer).

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
  - [SMTP Settings](#smtp-settings)
  - [Customizing HTML Templates](#customizing-html-templates)
- [Usage](#usage)
  - [API Endpoint](#api-endpoint)
  - [Sample Payload](#sample-payload)
- [Project Structure](#project-structure)
- [Contributing](#contributing)
- [License](#license)

## Features

- Handles POST requests with JSON payload to send emails.
- Validates required fields in the incoming data.
- Uses HTML templates for success and failure notifications.
- Utilizes PHPMailer for robust email sending capabilities.

## Prerequisites

- **PHP**: Version 7.4 or higher.
- **Composer**: Dependency manager for PHP.
- **Web Server**: Apache, Nginx, or any server capable of running PHP scripts.
- **PHPMailer**: Automatically handled via Composer.

## Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-username/php-mailer-api.git
   cd php-mailer-api

2. **Install Dependencies: Ensure you have Composer installed. Then run:**

    ```bash 
      composer install

3. **Set Up the Web Server:**
   
   - If using XAMPP, place the project folder inside C:\xampp\htdocs\.
   - Start Apache via the XAMPP control panel.
   - Access the API via http://localhost/mailer/index.php.

## Configuration

The SMTP settings are configured in src/send_email.php. Update the following variables with your SMTP server details:

