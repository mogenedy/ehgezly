<<<<<<< HEAD
# Ehgezly
=======
###### Postman Collection #########
1. Open Postman.
2. Choose **postman**, and select `postman_collection_apis.json`.
3. Start testing the API requests.[`postman/postman_collection_apis.json`]

you don't have to make an authentication token to interact with the API(test version token will be done if nedded) .

business requriments:
######################
this system has been built and designed to enable project owner  to re-sale their services and it is flexiable for any kind of reservation system.(such as a gym reservation system,hotel reservation system)dynamicly.

feature suggestions:
######################
throw my travelling experience.(I've already made many bookings) these two features are very important:
-rate system.(most customers prefer to rate their services and they also build their choce based on other ratings)
-coupons(discounts is a good for attract more customers ).



how to install project:
#############################
1. clone the project. `git clone https://github.com/ehgezly/ehgezly.git`
2. run `composer install`.
3.run php artisan key:generate.
4.run `php artisan migrate`.
5.run `php artisan mi:f --seed`.
6.run `php artisan serve`.
7.open your browser and go to `http://localhost:8000/`.

important note:
######################
1. you don't have to make an authentication token to interact with the API(test version token will be done if nedded) .
2-admin authentication: run seeder or
email: admin@gmail.com
password: password
3-user authentication: run seeder or
email: user@gmail33.com
password: password
>>>>>>> ea453e5 (fisrt commit)
