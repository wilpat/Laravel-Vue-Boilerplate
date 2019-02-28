# Laravel-Vue-Boilerplate
I created this boilerplate to help speed up my kickstart time for single page laravel projects that uses authentication.

# How it works
- `JWT` for authentication for login and registration
- `Vuex` for state management 
- `Vue-Router` for routing 
- `Object-encode` form obfuscating the user's details that gets stored in the local storage.

# API
 - Registration - /api/auth/register
 - Login - /api/auth/login
 
# Routes
WIth JWT and SPAs, routes/api/ folder is used to register routes as opposed to the default routes/web for laravel

# Requirements
- [Laraval server requirements for version 5.7](https://laravel.com/docs/5.7#server-requirements)
- [XAMPP](https://www.apachefriends.org/index.html)

# Setting up the project
- Clone the repository
- Run `composer install`
- Create a database and setup the database configuration inside .env
- Run `php artisan key:generate`
- Run `php artisan migrate`

## Create your jwt secret key to be used in the `.env` file
- Run `php artisan jwt:secret`

## Install all npm dependencies
- Run `npm install`

# Create dummy accounts to use in interacting with the app
- Use `php artisan db:seed`

# Set encryption key
 Edit the encryption key variable in the the store.js file 
 
 This would be used to encrypt the object containing the user's details and token upon authentication

# Start application

Open a terminal and run `npm run dev` then run `php artisan serve` in another

### Credits
Frontend design of login / register page is based on a template from [Colorlib](https://colorlib.com/wp/)

Got questions? Shoot me a mail [here](mailto:wilpat456@gmail.com)
