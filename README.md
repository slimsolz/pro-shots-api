# Pro Shots Api 📸

API to manage product photography, connect pro-photographers to people who need good photography for their products.

## Features

- Register: `POST api/v1/auth/register`
- Login: `POST api/v1/auth/login`
- Update Profile: `PATCH api/v1/profile`
- Get Profile: `GET api/v1/profile`

## Technologies

- Cloudinary
- Laravel
- Mysql
- phpunit

## Getting Started

- Install composer on your computer
- Clone this repository using git clone <https://github.com/slimsolz/pro-shots-api.git>
- Use the .env.example file to setup your environmental variables and rename the file to .env
- Run `composer install` to install all dependencies
- Run `php artisan migrate` to migrate tables
- Run `php artisan db:seed` to seed the tables
- Run `php artisan serve` to start the server
- Interact with localhost:[PORT] in POSTMAN to access the application

## Testing

- run `composer test`, This will run test

## Using the Live App

- The live application is hosted at (note: don't for get to include `/api/v1/` when a request to an endpoint)

## Contributing Guide

- Fork the repository
- Make your contributions
- Write Test Cases for your contribution with at least 80% coverage
- Create a pull request against the develop branch

## Author

- Odumah Solomon

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
