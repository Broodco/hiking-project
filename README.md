# Hiking Project

## How to run this project

-> Replace *.env.example* with *.env* containing your database credentials.

-> Go to the project root and run *docker compose up --build*

-> SSH into the php-fpm container and run the following commands : 
> composer dump-autoload

> npx tailwindcss -i resources/style/input.css -o public/style/output.css --watch

-> Connect to the _hiking-project_ database inside the mysql container, and
run the _mysql_scripts/db_creation.sql_ file to generate the required database.

-> Go to `http://localhost:3000` to access the website

## Next steps 

- [ ] Add a custom OOP Session management