# IIARD Academic Multi-Journal Management Platform

## Overview

The IIARD Academic Multi-Journal Management Platform is a PHP-based web application designed to manage and publish multiple academic journals within a single unified infrastructure.

The system supports the complete lifecycle of academic publishing across multiple journals, including:

* Journal management
* Issue and volume tracking
* Article publication
* Editorial board management
* Abstract rendering
* Structured indexing and search

This repository represents a cleaned public version of the platform’s architecture and core application logic.

---

# System Architecture

The platform follows a modular structure separating:

* Presentation Layer (UI + templates)
* Application Logic (Controllers / workflow logic)
* Data Layer (MySQL relational database)
* Static Assets (CSS, JS, images)

The system supports multiple journals operating within a shared database model while maintaining journal-level content isolation.

---

# Directory Structure

```
/public
    index.php
    journal.php
    abstract.php
    search.php
    editorials.php
    /assets
        /css
        /js
        /images

/app
    /controllers
    /models

/config
    database.example.php
```

### Directory Explanation

* **/public** → Entry points and publicly accessible files
* **/assets** → Static resources
* **/app/controllers** → Business logic and routing handlers
* **/app/models** → Database interaction layer
* **/config** → Environment configuration (example file only)

Sensitive files such as production credentials, payment gateways, webhooks, and administrative backends have been removed from this public repository.

---

# Technology Stack

* PHP (Core backend)
* MySQL (Relational database)
* JavaScript (Frontend interactivity)
* CSS (Styling)
* Apache (Deployment server)

---

# Local Development Setup

## 1. Clone Repository

```
git clone https://github.com/yourusername/iiard-academic-journal-platform.git
```

## 2. Create Database

```
CREATE DATABASE iiard_db;
```

## 3. Configure Database Connection

Edit:

```
/config/database.example.php
```

Example configuration:

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'iiard_db');
define('DB_USER', 'root');
define('DB_PASS', 'password');
```

Rename the file to:

```
database.php
```

---

# Database Schema

Below is the relational structure used by the system.

---

## Table: journals

```sql
CREATE TABLE journals (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    journal_name VARCHAR(11) NOT NULL,
    journal_name_full VARCHAR(150) NOT NULL,
    journal_category VARCHAR(50) NOT NULL,
    journal_description VARCHAR(6500) NOT NULL,
    journal_description_list VARCHAR(6200) NOT NULL,
    path VARCHAR(30) NOT NULL,
    journal VARCHAR(3) NOT NULL DEFAULT 'OLD',
    ISSN VARCHAR(50) NOT NULL,
    doij VARCHAR(200) NOT NULL
);
```

Purpose:
Stores metadata for each journal managed by the platform.

---

## Table: publications

```sql
CREATE TABLE publications (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    pub_name VARCHAR(500) NOT NULL,
    pub_issue VARCHAR(10) NOT NULL DEFAULT 'CURRENT',
    pub_volume VARCHAR(20) NOT NULL,
    pub_author VARCHAR(500) NOT NULL,
    pub_journal VARCHAR(300) NOT NULL,
    date_added TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    path VARCHAR(250) NOT NULL,
    pub_abstract VARCHAR(2000) NOT NULL,
    doi VARCHAR(100) NOT NULL,
    keyword VARCHAR(200) NOT NULL,
    reference VARCHAR(8000) NOT NULL,
    status VARCHAR(200) NOT NULL DEFAULT 'published'
);
```

Purpose:
Stores all published articles across journals. Each publication is linked to a journal via `pub_journal`.

---

## Table: editorials

```sql
CREATE TABLE editorials (
    ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(500) NOT NULL,
    univ VARCHAR(500) NOT NULL,
    dept VARCHAR(500) NOT NULL,
    address VARCHAR(500) NOT NULL,
    journal VARCHAR(50) NOT NULL,
    path VARCHAR(150) NOT NULL
);
```

Purpose:
Stores editorial board members for each journal.

---

# Hosting Deployment (Shared Hosting / cPanel)

## Production Deployment Steps

1. Upload project files to:

   ```
   public_html/
   ```

2. Create a MySQL database via cPanel.

3. Import the database schema using phpMyAdmin.

4. Configure database credentials in:

   ```
   /config/database.php
   ```

5. Ensure Apache mod_rewrite is enabled if clean URLs are used.

6. Set appropriate permissions:

   * Directories: 755
   * Files: 644

---

# Multi-Journal Design Model

The system supports:

* Multiple journals stored in the `journals` table
* Articles linked to journals via `pub_journal`
* Editorial boards filtered by `journal`
* Dynamic routing based on journal identifiers

This allows new journals to be added without modifying core application logic.

---

# Security Notes

The following components are excluded from this repository:

* Production credentials
* Payment integrations
* Webhooks
* Transaction verification logic
* Admin authentication modules
* User-uploaded content

All sensitive credentials have been rotated.

---

# My Contributions

* Multi-journal relational schema design
* Backend workflow implementation
* Journal-level content isolation logic
* Editorial board modularization
* Publication indexing architecture
* Production deployment

---

# Future Improvements

* Role-Based Access Control (RBAC)
* REST API Layer
* Journal-level analytics dashboard
* Containerized deployment (Docker)
* CI/CD pipeline integration

---

# License

This repository is shared for portfolio and demonstration purposes only.
