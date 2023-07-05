## How to run the project

 - Install docker desktop on your machine
 - extract this project to a location of your choice
 - navigate to the project directory and run the command in terminal:  sudo docker-compose up --build.
 - the above command will create a virtual environment on your PC within which this project will run
 - to get into your container issue this command: sudo docker exec -it app bash
 - from within the container, CD into todo. From here you can then run the following
 - php artisan migrate:fresh --seed create the Db tables and seed the data.
 - login using any user in the users seeder class. The password for all users is password.

## To open the project in the browser visit localhost and press enter

## To access the database go to localhost:8888 in the browser and user "root" and "password" as credentials

### That's all 
