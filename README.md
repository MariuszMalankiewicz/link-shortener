# Link Shortener

A link-shortening application that allows users to create shortened, easy-to-remember links, similar to popular services like Bit.ly. The application is built using the Laravel framework on the backend and Vue.js on the frontend, providing a dynamic and responsive user interface.

## Features

- **Creating shortened links** – the user inputs a full URL, and the application generates a shorter, unique link..
- **Storing links in the database** – each shortened link is saved in the database, allowing users to view a history of generated links.
- **Redirecting to the full URL** – clicking on a shortened link redirects the user to the original, full URL.
- **Displaying a list of shortened links** – the interface allows users to view all created links along with their original URLs.

## Technologies

- **Backend**: Laravel – responsible for the application logic, database handling, and managing shortened links.
- **Frontend**: Vue.js – provides a dynamic and user-friendly interface for interacting with the API.
- **Database**: MySQL – used to store the original and shortened links.

## API Structure

The application has several main endpoints:

- **POST `/api/shorten`** – creates a new shortened link based on the original URL.
- **GET `/api/{short_url}`** – redirects the user to the full URL based on the provided short code.
- **GET `/api/links`** – returns a list of all created links.

## Example Requests

### 1. Creating a Shortened Link

```html
POST `/api/shorten`
Content-Type: application/json

{
  "original_url": "https://www.example.com"
}
```

Example Response:
```json
{
  "short_url": "http://skrocynyurl/abc123"
}
```

### 2. Redirect to Full URL

```htm
GET /api/{shorten}
Content-Type: application/json
```

Example Response:
```json
{
  "original_url": "https://www.example.com"
}

```

### 3. Retrieve List of Links

```htm
GET /api/links
Content-Type: application/json
```

Example Response:
```json
[
  {
    "id": 1,
    "original_url": "https://www.example.com",
    "short_code": "abc123",
    "created_at": "2024-11-10",
    "updated_at": "2024-11-10"
  },
]


```
## Installation

1. Clone the repository and navigate to the project directory.
```html
git clone https://github.com/MariuszMalankiewicz/link-shortener.git
```

2. Install PHP and JavaScript dependencies:
```html
composer install
npm install
```

3. Configure the .env file and create the database.

4. Run migrations to create the tables:
```html
php artisan migrate
```

5. Start the Laravel development server and the frontend compiler:
```html
php artisan serve
npm run dev
```

6. Testing **(Optional)**
To run tests:
```html
php artisan test
```
<br>
The tests cover the functionality of creating shortened links, redirects, and displaying the list of links.
