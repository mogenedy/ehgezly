# Ehgezly

## 📦 Postman Collection

1. Open Postman.
2. Choose **Import**, then select `postman/postman_collection_apis.json`.
3. Start testing the API requests.

> 🔐 You **don’t** need to generate an authentication token to interact with the API (a test version token will be provided if needed).

---

## 📌 Business Requirements

This system has been built and designed to enable project owners to re-sell their services. It is flexible and can be adapted to **any kind of reservation system**, such as:
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
4.php artisan key:generate
5.php artisan migrate
6-php artisan migrate:fresh --seed
🔐 Authentication (Seeded Users)

You can use the following test accounts:
Admin
Email: admin@gmail.com
Password: password

User
Email: user@gmail33.com
Password: password

   ```