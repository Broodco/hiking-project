# Hiking Project

**Still very much a work-in-progress**

## How to run this project

-> Replace *.env.example* with *.env* containing your database credentials.

-> Go to the project root and run *docker compose up --build*

-> SSH into the php-fpm container and run the following commands : 
> composer dump-autoload

> npm install && npm run dev

-> Connect to the _hiking-project-broodco_ database inside the mysql container, and
run the _mysql_scripts/db_creation.sql_ file to generate the required database.

-> Go to `http://localhost:3000` to access the website

## Next steps 

- Hike edition/deletion
- Attribute hikes to user and allow edit/delete to linked user
- Hike custom picture
- User custom profile
- Admin role and custom permissions (manage tags for example)