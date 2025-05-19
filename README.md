# Getting Started with Laravel Policies: A Step-by-Step Guide

A comprehensive guide and implementation of Laravel Policies for managing authorization in Laravel applications. This project demonstrates how to implement role-based access control (RBAC) using Laravel's policy system.

<p align="center">
    <br />
<img src="https://miro.medium.com/v2/resize:fit:700/1*lJXgnAuSjx-ai7VbUlMiIA.png" alt="Intro" /><br />
</p>

## Overview

Here I  shows how to implement a robust authorization system in Laravel using Policies. It includes:
- Role-based access control
- User and Post management
- API authentication using Laravel Sanctum
- Policy-based authorization for different user roles




## Prerequisites

- PHP 8.1 or higher
- Composer
- MySQL or another database system
- Laravel 10.x

## Installation

1. Clone the repository:
```bash
git clone https://github.com/murilolivorato/laravel_acl_policies.git
cd laravel_acl_policies
```

2. Install dependencies:
```bash
composer install
```

3. Create and configure your `.env` file:
```bash
cp .env.example .env
```

4. Generate application key:
```bash
php artisan key:generate
```

5. Run migrations and seed the database:
```bash
php artisan migrate
php artisan db:seed
```

6. Install Laravel Sanctum:
```bash
composer require laravel/sanctum
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
```

## Project Structure

The project implements a role-based authorization system with the following key components:

### Models
- `User` - Handles user authentication and role relationships
- `Role` - Manages user roles
- `Post` - Represents blog posts with user ownership

### Policies
- `PostPolicy` - Controls access to post-related actions
- `UserPolicy` - Manages user-related permissions

### Key Features

1. **Role-Based Access Control**
   - Super Admin role with full access
   - Manager role with limited access
   - Custom role permissions

2. **Policy Implementation**
   - View permissions
   - Create/Update permissions
   - Delete permissions
   - Own resource management

3. **API Authentication**
   - Token-based authentication using Sanctum
   - Role-specific abilities
   - Secure API endpoints

## API Endpoints

### Authentication
- `POST /api/login` - User login
- `POST /api/logout` - User logout (requires authentication)

### Users
- `GET /api/users` - List users
- `GET /api/users/{user}` - Get specific user
- `POST /api/users` - Create user
- `PUT /api/users/{user}` - Update user
- `DELETE /api/users/{user}` - Delete user

### Posts
- `GET /api/posts` - List posts
- `GET /api/posts/{post}` - Get specific post
- `POST /api/posts` - Create post
- `PUT /api/posts/{post}` - Update post
- `DELETE /api/posts/{post}` - Delete post

## Usage Examples

### Manager Role
- Can view own user profile
- Can create, update, and delete own posts
- Can view own posts

### Super Admin Role
- Can view all users
- Can manage all posts
- Full access to all resources

## Testing the API

1. Login to get your authentication token:
```bash
curl -X POST http://your-domain/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"user@example.com","password":"password"}'
```

2. Use the token for authenticated requests:
```bash
curl -X GET http://your-domain/api/posts \
  -H "Authorization: Bearer {your-token}"
```

## Author

**Murilo Livorato**
- GitHub: [murilolivorato](https://github.com/murilolivorato)
- LinkedIn: [Murilo Livorato](https://www.linkedin.com/in/murilo-livorato-80985a4a/)

## License

This project is open-sourced software licensed under the MIT license.

## Acknowledgments

This tutorial was inspired by concepts from Jeremy McPeak's Laravel API Master Class on Laracasts.


<div align="center">
  <h3>⭐ Star This Repository ⭐</h3>
  <p>Your support helps us improve and maintain this project!</p>
  <a href="https://github.com/murilolivorato/laravel_acl_policies/stargazers">
    <img src="https://img.shields.io/github/stars/murilolivorato/laravel_acl_policies?style=social" alt="GitHub Stars">
  </a>
</div>
