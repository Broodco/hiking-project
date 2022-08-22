# Hiking Project

## How to run this project

-> Replace *.env.example* with *.env* containing your database credentials.

-> Go to the project root and run *docker compose up --build*

-> SSH into the php-fpm container and run `npx tailwindcss -i resources/style/input.css -o public/style/output.css --watch`

-> Go to `http://localhost:3000` to access the website

## Next steps 

- [ ] Add a custom OOP Session management