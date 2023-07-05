## Instructions on running the project locally ##
- Clone the repository to a location of your choice
- Make sure you have docker desktop installed on the machine you are using to test the application
- run navigate to the project directory and run the following command
- - docker-compose up --build
- the above command will pull in mysql db, nginx, redis into the container.
- once all the installation is done , issue the following command to get into the project container.

- docker exec -it app bash
- the above command will get you into the app container withing which the project is running
- the Db is running on the DB container and to access it on  the browser go to the URL localhost:8888 and user root password as credentials

- Within the app container, navigate to the following directory assessment.

## To create the tables and seeds ##

- From withing the assessment directory run the following commands
- composer install
- php artisan key:generate
- php artisan optimize:clear
- php artisan migrate:fresh --seed

### The above will seed the database with test areas and shops data ###

#### To test the APIs using postman ####
 - A get request to  localhost/api/areas   will give you a list of areas
 - A get request to  localhost/api/areas/1  will give you an area with the ID of 1
 - A put request to  localhost/api/areas/1  with a json body of "area_name":"new name"  will update area with the given ID to the new name
 - A post request to localhost/api/areas with a json body of "area_name":"area name" will create a new area name in the DB


- A get request to  localhost/api/shops   will give you a list of shops
- A get request to  localhost/api/shops/1  will give you an shop with the ID of 1
- A put request to  localhost/api/shops/1  with a json body of {"shop_name":"new name","area_id":1}  will update shop with the given ID to the new name
- A post request to localhost/api/shops with a json body of "shop_name":"shop name" will create a new shop name in the DB