# ✨ Ehgezly - Service Reservation System

**Ehgezly** is a dynamic and flexible Laravel-based reservation system tailored for service providers. It's ideal for a wide range of industries, including gyms, hotels, clinics, and more. The system is built to be scalable, customizable, and ready for real-world deployments.

---

## 📌 Business Use Case

Ehgezly empowers businesses to **resell their services** through a robust and user-friendly booking system. It supports:

- 🏋️ Gym Reservation Systems  
- 🏨 Hotel Booking Platforms  
- 🏥 Clinic & Appointment Scheduling  

The architecture is designed with flexibility in mind to allow easy adaptation for various business models.

---

## 💡 Suggested Enhancements

To further enhance the user experience and increase customer engagement, consider the following features:

- ⭐ **Rating & Review System** – Allow users to review services before booking.  
- 🎟️ **Coupons & Discounts** – Boost promotions and user retention through discount codes.

---

## 📦 Postman Collection (API Testing)

To test the API using Postman:

1. Open **Postman**.  
2. Click **Import**.  
3. Select the file: `postman/postman_collection_apis.json`.  
4. Start testing the available endpoints.

> 🔐 Authentication token is not required for most requests during testing. A sample token will be provided if needed.

---

## 🛠️ Installation Guide

Follow these steps to set up the project on your local machine:

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/ehgezly/ehgezly.git
cd ehgezly
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Configure the Environment

```bash
cp .env.example .env
```

Then edit your `.env` file with your local database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

### 4️⃣ Generate Application Key

```bash
php artisan key:generate
```

### 5️⃣ Run Database Migrations

```bash
php artisan migrate
```

### 6️⃣ Seed the Database (Optional for Testing)

```bash
php artisan migrate:fresh --seed
```

### 7️⃣ Serve the Application

```bash
php artisan serve
```

Visit your application at [http://localhost:8000](http://localhost:8000)

---

## 🔐 Authentication (Seeded Test Users)

You can log in using the following seeded credentials:

### 🛠️ Admin Account

- **Email:** admin@gmail.com  
- **Password:** password

### 👤 Regular User

- **Email:** user@gmail33.com  
- **Password:** password

---

## 📬 Contribution & License

Pull requests are welcome. For major changes, please open an issue first to discuss what you'd like to change.

This project is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

---

## 🔗 Repository

[GitHub Repository – Ehgezly](https://github.com/ehgezly/ehgezly)
