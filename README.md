✨ Ehgezly - Service Reservation System
A dynamic and flexible reservation system for reselling services. Suitable for gyms, hotels, clinics, and more.

📦 Postman Collection
To test the API using Postman:

Open Postman.

Click Import, then select:
postman/postman_collection_apis.json

Start testing the API requests.

🔐 Authentication token is not required for testing. A test token will be provided if needed.

📌 Business Requirements
This system is built to empower project owners to re-sell their services. It is highly customizable and can adapt to different domains, such as:

🏋️ Gym Reservation System

🏨 Hotel Reservation System

🏥 Clinic or Appointment Booking System

Designed with scalability and flexibility in mind.

💡 Suggested Features (Based on Real Booking Experience)
Here are some recommended features to enhance customer experience:

⭐ Rating System
Customers prefer to see reviews before booking.

🎟️ Coupons & Discounts
Promote engagement and attract new users.

🚀 How to Install the Project
Follow these steps to set up the project locally:

bash
Copy
Edit
# 1. Clone the repository
git clone https://github.com/ehgezly/ehgezly.git
cd ehgezly

# 2. Install dependencies
composer install

# 3. Copy the environment example file
cp .env.example .env

# 4. Generate the application key
php artisan key:generate
Edit the .env file to match your database configuration:

env
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
bash
Copy
Edit
# 5. Run the database migrations
php artisan migrate

# 6. Seed the database with sample data
php artisan migrate:fresh --seed

# 7. Start the development server
php artisan serve
🔐 Authentication (Seeded Users)
Use these test accounts to log in:

🛠️ Admin
Email: admin@gmail.com

Password: password

👤 Regular User
Email: user@gmail33.com

Password: password