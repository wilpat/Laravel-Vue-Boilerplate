# Laravel-Vue-Boilerplate
I created this boilerplate to help speed up my kickstart time for single page laravel projects that uses authentication.

It implements JWT for authentication, Vuex for state management, Vue-Router for routing and `Object-encode` form obfuscating 
the user's details that gets stored in the local storage.

# Requirements
- [Laraval server requirements](https://laravel.com/docs/5.7#server-requirements)
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


