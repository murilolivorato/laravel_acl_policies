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
		"_postman_id": "b9adee5b-c58e-4603-a994-3cacc3f80f86",
		"name": "Laravel Policies",
		"description": "API collection for User and Post routes",
		"schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json",
		"_exporter_id": "9356399"
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
						"body": {
							"mode": "raw",
							"raw": "{\n  \"email\": \"juana.kuvalis@example.org\",\n  \"password\": \"password\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/login",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"login"
							]
						}
					},
					"response": []
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
							"raw": "{{base_url}}/api/logout",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"logout"
							]
						}
					},
					"response": []
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
								"key": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "{{base_url}}/api/users",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users"
							]
						}
					},
					"response": []
				},
				{
					"name": "Get User",
					"request": {
						"method": "GET",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "{{base_url}}/api/users/1",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users",
								"1"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create User",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"name\": \"New User\",\n  \"email\": \"newuser@example.com\",\n  \"password\": \"password\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/users",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update User",
					"request": {
						"method": "PUT",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"name\": \"Updated User\",\n  \"email\": \"updateduser2@example.com\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/users/41",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users",
								"41"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete User",
					"request": {
						"method": "DELETE",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "{{base_url}}/api/users/41",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"users",
								"41"
							]
						}
					},
					"response": []
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
								"key": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "{{base_url}}/api/posts",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"posts"
							]
						}
					},
					"response": []
				},
				{
					"name": "Get Post",
					"request": {
						"method": "GET",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"url": {
							"raw": "{{base_url}}/api/posts/34",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"posts",
								"34"
							]
						}
					},
					"response": []
				},
				{
					"name": "Create Post",
					"request": {
						"method": "POST",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"title\": \"New Post\",\n  \"content\": \"Post content\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/posts",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"posts"
							]
						}
					},
					"response": []
				},
				{
					"name": "Update Post",
					"request": {
						"method": "PUT",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json"
							}
						],
						"body": {
							"mode": "raw",
							"raw": "{\n  \"title\": \"Updated Post\",\n  \"content\": \"Updated content\"\n}"
						},
						"url": {
							"raw": "{{base_url}}/api/posts/33",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"posts",
								"33"
							]
						}
					},
					"response": []
				},
				{
					"name": "Delete Post",
					"request": {
						"method": "DELETE",
						"header": [
							{
								"key": "Content-Type",
								"value": "application/json",
								"type": "text"
							}
						],
						"url": {
							"raw": "{{base_url}}/api/posts/33",
							"host": [
								"{{base_url}}"
							],
							"path": [
								"api",
								"posts",
								"33"
							]
						}
					},
					"response": []
				}
			]
		}
	],
	"auth": {
		"type": "bearer",
		"bearer": [
			{
				"key": "token",
				"value": "2|QNoLbgptc0r4SMCzvRdtG1glGXl31wcg8Abwddo8dfc858a8",
				"type": "string"
			}
		]
	},
	"event": [
		{
			"listen": "prerequest",
			"script": {
				"type": "text/javascript",
				"packages": {},
				"exec": [
					""
				]
			}
		},
		{
			"listen": "test",
			"script": {
				"type": "text/javascript",
				"packages": {},
				"exec": [
					""
				]
			}
		}
	],
	"variable": [
		{
			"key": "base_url",
			"value": "localhost:8081",
			"type": "string"
		}
	]
}

```
