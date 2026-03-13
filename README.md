<div align="center">

# 🌐 ConnectHub

### A feature-rich social media platform built with Laravel 9

[![PHP Version](https://img.shields.io/badge/PHP-8.0%2B-777BB4?logo=php&logoColor=white)](https://php.net)
[![Laravel](https://img.shields.io/badge/Laravel-9.x-FF2D20?logo=laravel&logoColor=white)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5.x-7952B3?logo=bootstrap&logoColor=white)](https://getbootstrap.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

</div>

---

## 📖 Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database Schema](#database-schema)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Configuration](#configuration)
  - [Running the Application](#running-the-application)
- [Usage](#usage)
- [API Overview](#api-overview)
- [Route Summary](#route-summary)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

---

## 💡 About the Project

**ConnectHub** is a full-stack social media web application that brings people together. Built on the robust **Laravel 9** framework, it allows users to create accounts, share posts, interact with friends through likes and comments, follow other users, exchange private messages, and receive real-time notifications — all through a clean, responsive interface powered by Bootstrap 5.

Whether you're looking to study a real-world Laravel application or use this as a foundation for your own social platform, ConnectHub provides a solid, well-structured codebase following Laravel best practices.

> 💡 **Suggested repository name:** `connecthub` — feel free to rename the repo to match!

---

## ✨ Features

### 👤 User Accounts & Profiles
- Secure registration and login with email & password
- Forgot password / reset password via email
- Customizable profile with **profile photo** and **cover photo**
- View your posts count and friends count on your profile page

### 📝 Posts & Feed
- Create and share posts with your followers
- Home feed that aggregates posts from all users you follow
- Share other users' posts to your own feed
- View a single post on its own dedicated page

### 💬 Comments
- Comment on any post
- Like and unlike individual comments
- Real-time comment count updates

### ❤️ Likes
- Like and unlike posts (standard and AJAX-powered for instant feedback)
- Like and unlike comments
- All engagement data persisted to the database

### 👥 Follow System
- Follow and unfollow other users
- View a user's followers and following list
- Dynamic follow status checking

### 💌 Direct Messaging
- Private 1-to-1 chat rooms between users
- Full message history with timestamps
- Participant-based room management

### 🔔 Notifications
- Receive notifications when followed users create new posts
- Mark all notifications as read at once
- Polymorphic notification system (easily extensible)

### 🔐 Authentication & Security
- Laravel's built-in authentication scaffolding
- API authentication via **Laravel Sanctum**
- Middleware-protected routes (all routes require authentication)
- CSRF protection on all forms

---

## 🛠 Tech Stack

| Layer | Technology |
|---|---|
| **Backend Framework** | Laravel 9.x |
| **Language** | PHP 8.0+ |
| **Frontend** | Blade Templates, Bootstrap 5, Sass |
| **JavaScript** | Axios (AJAX), Laravel Echo, Pusher JS |
| **Authentication** | Laravel Auth + Laravel Sanctum |
| **Real-time** | Pusher (configured) |
| **Build Tool** | Vite |
| **Database** | MySQL / PostgreSQL (migration-ready) |
| **Testing** | PHPUnit |
| **HTTP Client** | Guzzle |

---

## 📁 Project Structure

```
connecthub/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/              # Login, Register, Password Reset
│   │   │   ├── Front/             # Home, Profile, Following pages
│   │   │   ├── Post/              # Post creation & display
│   │   │   │   ├── Comment/       # Comment creation & likes
│   │   │   │   ├── Like/          # Post likes (standard + AJAX)
│   │   │   │   └── Share/         # Post sharing
│   │   │   ├── Follow/            # Follow, Unfollow, Chat
│   │   │   └── Profile/           # Profile editing
│   │   ├── Middleware/
│   │   └── Requests/              # Form request validation
│   ├── Models/
│   │   ├── User.php
│   │   ├── Post.php
│   │   ├── Comment.php
│   │   ├── Like.php
│   │   ├── Comment_like.php
│   │   ├── Message.php
│   │   ├── Room.php
│   │   └── Participant.php
│   ├── Notifications/             # Notification classes
│   └── Traits/                    # Reusable traits
├── database/
│   ├── migrations/                # 13 database migrations
│   ├── seeders/
│   └── factories/
├── resources/
│   ├── views/
│   │   ├── Front-end/             # Home, Profile, Chat, etc.
│   │   ├── auth/                  # Login, Register, Password pages
│   │   ├── layouts/               # Master layout template
│   │   └── includes/              # Reusable partials (header, etc.)
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php                    # All web routes
│   ├── api.php                    # API routes (Sanctum)
│   └── channels.php               # Broadcasting channels
├── public/
├── storage/
├── tests/
├── vite.config.js
└── composer.json
```

---

## 🗄 Database Schema

The application uses **13 database migrations**:

| Table | Purpose |
|---|---|
| `users` | User accounts (name, email, password, profile/cover photos) |
| `user_user` | Self-referential follow relationships |
| `posts` | User-created posts |
| `likes` | Post likes (user ↔ post) |
| `comments` | Comments on posts |
| `comment_likes` | Comment likes (user ↔ comment) |
| `rooms` | Private chat rooms |
| `participants` | Chat room membership |
| `messages` | Direct messages within rooms |
| `notifications` | Polymorphic notification records |
| `password_resets` | Password reset tokens |
| `failed_jobs` | Background job failure tracking |
| `personal_access_tokens` | Sanctum API tokens |

---

## 🚀 Getting Started

### Prerequisites

Make sure the following are installed on your machine:

- **PHP** >= 8.0
- **Composer** >= 2.x
- **Node.js** >= 16.x & **NPM**
- **MySQL** or **PostgreSQL**
- A **Pusher** account (for real-time features — optional for local development)

---

### Installation

**1. Clone the repository**

```bash
git clone https://github.com/Mohammed-Alijl/ConnectHub.git
cd connecthub
```

**2. Install PHP dependencies**

```bash
composer install
```

**3. Install JavaScript dependencies**

```bash
npm install
```

**4. Create the environment file**

```bash
cp .env.example .env
```

**5. Generate the application key**

```bash
php artisan key:generate
```

---

### Configuration

Open the `.env` file and update the following sections:

**Database**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=connecthub
DB_USERNAME=your_db_user
DB_PASSWORD=your_db_password
```

**Mail** (required for password reset emails)
```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="no-reply@connecthub.app"
MAIL_FROM_NAME="ConnectHub"
```

**Pusher** (optional — for real-time notifications and messaging)
```env
PUSHER_APP_ID=your_app_id
PUSHER_APP_KEY=your_app_key
PUSHER_APP_SECRET=your_app_secret
PUSHER_APP_CLUSTER=mt1

BROADCAST_DRIVER=pusher
```

---

### Running the Application

**1. Run database migrations**

```bash
php artisan migrate
```

**2. Create the storage symlink** (for profile photo uploads)

```bash
php artisan storage:link
```

**3. Build frontend assets**

```bash
# For development (with hot reload)
npm run dev

# For production
npm run build
```

**4. Start the development server**

```bash
php artisan serve
```

Visit **http://localhost:8000** in your browser. Register a new account to get started!

---

### Running with Laravel Sail (Docker)

If you prefer a Docker-based environment, you can use **Laravel Sail**:

```bash
./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run dev
```

---

## 🧭 Usage

| Page | URL | Description |
|---|---|---|
| Home Feed | `/home` | View posts from users you follow |
| Profile | `/profile` | View your profile, posts, and stats |
| Edit Profile | `/profile/edit` | Update your name, bio, and photos |
| Following | `/following/{user_id}` | See a user's followers list |
| Chat | `/follow/chat/{user_id}` | Open a private chat with a user |
| Single Post | `/post/display/{post_id}` | View a post and its comments |

---

## 🔌 API Overview

The project includes a basic **Sanctum-protected API** (`/api`). Routes are defined in `routes/api.php` and are ready to be extended.

| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/user` | Get the authenticated user (Sanctum) |

Additional API endpoints can be added by extending `routes/api.php` and creating dedicated API controllers.

---

## 🗺 Route Summary

All web routes are grouped under the `auth` middleware (authentication required):

| Method | URI | Action |
|---|---|---|
| `GET` | `/home` | Home feed |
| `POST` | `/post/add/{user_id}` | Create a post |
| `POST` | `/post/like/add/ajax` | Like a post (AJAX) |
| `GET` | `/post/like/add/{user_id}/{post_id}` | Like a post |
| `GET` | `/post/like/delete/{user_id}/{post_id}` | Unlike a post |
| `GET` | `/post/share/add/{post_id}` | Share a post |
| `GET` | `/post/display/{post_id}` | View a single post |
| `POST` | `/comment/add/{post_id}/{user_id}` | Add a comment |
| `GET` | `/comment/like/add/{user_id}/{comment_id}` | Like a comment |
| `GET` | `/comment/like/delete/{user_id}/{comment_id}` | Unlike a comment |
| `GET` | `/follow/add/{user_id}` | Follow a user |
| `GET` | `/follow/delete/{user_id}` | Unfollow a user |
| `GET` | `/follow/chat/{user_id}` | Open chat with a user |
| `POST` | `/follow/chat/sendMessage/{user_id}/{room_id}` | Send a message |
| `GET` | `/profile` | View own profile |
| `GET` | `/profile/edit` | Edit profile form |
| `POST` | `/profile/edit/apply` | Save profile changes |
| `GET` | `/notification/read/all` | Mark all notifications read |

---

## 🧪 Testing

The project includes a PHPUnit test suite. To run the tests:

```bash
php artisan test
```

Or directly with PHPUnit:

```bash
./vendor/bin/phpunit
```

---

## 🤝 Contributing

Contributions are welcome! To get started:

1. **Fork** the repository
2. **Create** a feature branch: `git checkout -b feature/your-feature-name`
3. **Commit** your changes: `git commit -m 'feat: add some feature'`
4. **Push** to the branch: `git push origin feature/your-feature-name`
5. **Open** a Pull Request

Please make sure your code follows PSR-12 coding standards and that all tests pass before submitting a PR.

---

## 🙏 Acknowledgements

- [Laravel](https://laravel.com) — the PHP framework for web artisans
- [Bootstrap](https://getbootstrap.com) — responsive CSS framework
- [Pusher](https://pusher.com) — real-time messaging infrastructure
- [Laravel Sanctum](https://laravel.com/docs/9.x/sanctum) — lightweight API authentication

---

## 📄 License

This project is open-source software licensed under the **[MIT License](https://opensource.org/licenses/MIT)**.

---

<div align="center">
  Made with ❤️ using Laravel 9
</div>
