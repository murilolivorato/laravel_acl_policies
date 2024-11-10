# Laravel API Project

This is a Laravel-based API project that includes user authentication using ACL and Policies.

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/your-repo.git
    cd your-repo
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
    ```bash
    cp .env.example .env
    ```

4. Run the database migrations:
    ```bash
    php artisan migrate
    ```

5. Seed the database :
    ```bash
    php artisan db:seed
    ```
   
## Usage

### Authentication

- **Login**
    ```http
    POST /login
    ```
  Request body:
    ```json
    {
        "email": "user@example.com",
        "password": "password"
    }
    ```

- **Logout**
    ```http
    POST /logout
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

### Users

- **Get Users**
    ```http
    GET /users
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

- **Get User**
    ```http
    GET /users/{user_id}
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

- **Create User**
    ```http
    POST /users
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    Content-Type: application/json
    ```
  Request body:
    ```json
    {
        "name": "New User",
        "email": "newuser@example.com",
        "password": "password"
    }
    ```

- **Update User**
    ```http
    PUT /users/{user_id}
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    Content-Type: application/json
    ```
  Request body:
    ```json
    {
        "name": "Updated User",
        "email": "updateduser@example.com"
    }
    ```

- **Delete User**
    ```http
    DELETE /users/{user_id}
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

### Posts

- **Get Posts**
    ```http
    GET /posts
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

- **Get Post**
    ```http
    GET /posts/{post_id}
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

- **Create Post**
    ```http
    POST /posts
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    Content-Type: application/json
    ```
  Request body:
    ```json
    {
        "title": "New Post",
        "content": "Post content"
    }
    ```

- **Update Post**
    ```http
    PUT /posts/{post_id}
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    Content-Type: application/json
    ```
  Request body:
    ```json
    {
        "title": "Updated Post",
        "content": "Updated content"
    }
    ```

- **Delete Post**
    ```http
    DELETE /posts/{post_id}
    ```
  Headers:
    ```http
    Authorization: Bearer {token}
    ```

###  Postman Files
```
{
  "info": {
    "name": "API Collection",
    "_postman_id": "unique-id",
    "description": "API collection for User and Post routes",
    "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
  },
  "item": [
    {
      "name": "Auth",
      "item": [
        {
          "name": "Login",
          "request": {
            "method": "POST",
            "header": [
              {
                "key": "Content-Type",
                "value": "application/json"
              }
            ],
            "url": {
              "raw": "{{base_url}}/login",
              "host": ["{{base_url}}"],
              "path": ["login"]
            },
            "body": {
              "mode": "raw",
              "raw": "{\n  \"email\": \"user@example.com\",\n  \"password\": \"password\"\n}"
            }
          }
        },
        {
          "name": "Logout",
          "request": {
            "method": "POST",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/logout",
              "host": ["{{base_url}}"],
              "path": ["logout"]
            }
          }
        }
      ]
    },
    {
      "name": "Users",
      "item": [
        {
          "name": "Get Users",
          "request": {
            "method": "GET",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/users",
              "host": ["{{base_url}}"],
              "path": ["users"]
            }
          }
        },
        {
          "name": "Get User",
          "request": {
            "method": "GET",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/users/{{user_id}}",
              "host": ["{{base_url}}"],
              "path": ["users", "{{user_id}}"]
            }
          }
        },
        {
          "name": "Create User",
          "request": {
            "method": "POST",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              },
              {
                "key": "Content-Type",
                "value": "application/json"
              }
            ],
            "url": {
              "raw": "{{base_url}}/users",
              "host": ["{{base_url}}"],
              "path": ["users"]
            },
            "body": {
              "mode": "raw",
              "raw": "{\n  \"name\": \"New User\",\n  \"email\": \"newuser@example.com\",\n  \"password\": \"password\"\n}"
            }
          }
        },
        {
          "name": "Update User",
          "request": {
            "method": "PUT",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              },
              {
                "key": "Content-Type",
                "value": "application/json"
              }
            ],
            "url": {
              "raw": "{{base_url}}/users/{{user_id}}",
              "host": ["{{base_url}}"],
              "path": ["users", "{{user_id}}"]
            },
            "body": {
              "mode": "raw",
              "raw": "{\n  \"name\": \"Updated User\",\n  \"email\": \"updateduser@example.com\"\n}"
            }
          }
        },
        {
          "name": "Delete User",
          "request": {
            "method": "DELETE",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/users/{{user_id}}",
              "host": ["{{base_url}}"],
              "path": ["users", "{{user_id}}"]
            }
          }
        }
      ]
    },
    {
      "name": "Posts",
      "item": [
        {
          "name": "Get Posts",
          "request": {
            "method": "GET",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/posts",
              "host": ["{{base_url}}"],
              "path": ["posts"]
            }
          }
        },
        {
          "name": "Get Post",
          "request": {
            "method": "GET",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/posts/{{post_id}}",
              "host": ["{{base_url}}"],
              "path": ["posts", "{{post_id}}"]
            }
          }
        },
        {
          "name": "Create Post",
          "request": {
            "method": "POST",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              },
              {
                "key": "Content-Type",
                "value": "application/json"
              }
            ],
            "url": {
              "raw": "{{base_url}}/posts",
              "host": ["{{base_url}}"],
              "path": ["posts"]
            },
            "body": {
              "mode": "raw",
              "raw": "{\n  \"title\": \"New Post\",\n  \"content\": \"Post content\"\n}"
            }
          }
        },
        {
          "name": "Update Post",
          "request": {
            "method": "PUT",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              },
              {
                "key": "Content-Type",
                "value": "application/json"
              }
            ],
            "url": {
              "raw": "{{base_url}}/posts/{{post_id}}",
              "host": ["{{base_url}}"],
              "path": ["posts", "{{post_id}}"]
            },
            "body": {
              "mode": "raw",
              "raw": "{\n  \"title\": \"Updated Post\",\n  \"content\": \"Updated content\"\n}"
            }
          }
        },
        {
          "name": "Delete Post",
          "request": {
            "method": "DELETE",
            "header": [
              {
                "key": "Authorization",
                "value": "Bearer {{token}}"
              }
            ],
            "url": {
              "raw": "{{base_url}}/posts/{{post_id}}",
              "host": ["{{base_url}}"],
              "path": ["posts", "{{post_id}}"]
            }
          }
        }
      ]
    }
  ]
}

```
