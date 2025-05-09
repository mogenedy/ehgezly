# Ehgezly

## 📦 Postman Collection

1. Open Postman.
2. Choose **Import**, then select `postman/postman_collection_apis.json`.
3. Start testing the API requests.

> 🔐 You **don’t** need to generate an authentication token to interact with the API (a test version token will be provided if needed).

---

## 📌 Business Requirements

This system has been built and designed to enable project owners to re-sale their services. It is flexible and can be adapted to **any kind of reservation system**, such as:
- Gym reservation system
- Hotel reservation system

It is designed to be **dynamic** and easily extendable.

---

## 💡 Feature Suggestions (from real-world travel experience)

Based on booking experience, these features are **highly recommended**:

- ⭐ **Rating system**: Most customers prefer to rate services and base their choices on reviews.
- 🎟️ **Coupons & Discounts**: Discounts help attract more customers and increase engagement.

---

## 🚀 How to Install the Project

1. Clone the repository:
   ```bash
   
 2.  git clone https://github.com/ehgezly/ehgezly.git
    
   cd ehgezly
   
3.composer install

4.Copy the example environment file and set up your environment variables:
cp .env.example .env

5-Generate the application key:

php artisan key:generate
6-Set up your database configuration in the .env file:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=your_database_name

DB_USERNAME=your_database_user

DB_PASSWORD=your_database_password

7-Run the database migrations:

php artisan migrate

8-seed the database

php artisan migrate:fresh --seed

Start the local development server:

php artisan serve

🔐 Authentication (Seeded Users)

You can use the following test accounts:

Admin

Email: admin@gmail.com

Password: password

User

Email: user@gmail33.com

Password: password
