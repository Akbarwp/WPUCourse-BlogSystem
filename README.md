# WPUCourse Blog System

WPUCourse Blog System is WPUCourse learning website about creating a Blog System. Features is including CRUD for posts, categories, login & register. Powered by Laravel 12, Laravel Breeze and MySQL database, this site provides a user-friendly interface for creating, reading, editing, and deleting posts, as well as efficiently managing categories. The blog page is designed to showcase content attractively, making it easy for visitors to find and read relevant posts.

## Tech Stack

- **Laravel 12**
- **MySQL Database**
- **Laravel Breeze**
- [**Filepond**](https://pqina.nl/filepond/)
- [**Quill Editor**](https://quilljs.com/)

## Features

- Main features available in this application:
  - Login & Register
  - CRUD Posts
  - CRUD Categories
  - Searching posts by keyword, author, category

## Installation

Follow the steps below to clone and run the project in your local environment:

1. Clone repository:

    ```bash
    git clone https://github.com/Akbarwp/WPUCourse-BlogSystem.git
    ```

2. Install dependencies use Composer and NPM:

    ```bash
    composer install
    npm install
    ```

3. Copy file `.env.example` to `.env`:

    ```bash
    cp .env.example .env
    ```

4. Generate application key:

    ```bash
    php artisan key:generate
    ```

5. Setup database in the `.env` file:

    ```plaintext
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=wpucourse_blogsystem
    DB_USERNAME=root
    DB_PASSWORD=
    ```

6. Run migration database:

    ```bash
    php artisan migrate
    ```

7. Run seeder database:

    ```bash
    php artisan db:seed
    ```

8. Run website:

    ```bash
    npm run dev
    php artisan serve
    ```

## Screenshot

- ### **Homepage**

<img src="https://github.com/user-attachments/assets/d746b7e6-0984-4d79-a369-982d941aee1b" alt="Homepage" width="" />
<br><br>

- ### **Blog page**

<img src="https://github.com/user-attachments/assets/263a2c1d-190e-4d3e-a5c3-e5901377b2d4" alt="Halaman Blog" width="" />
<br><br>

- ### **Dashboard Post page**

<img src="https://github.com/user-attachments/assets/55c06f9d-54fa-4d47-9b8b-4d4fe3a4c653" alt="Halaman Post" width="" />
&nbsp;&nbsp;&nbsp;
<img src="https://github.com/user-attachments/assets/3fe069b2-294b-4969-9618-15124a6276aa" alt="Halaman Ubah Post" width="" />
<br><br>
