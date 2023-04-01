# calculator-app

calculator app created with laravel in back end, vue js in front end.

<img width="692" alt="Screenshot 2023-04-01 at 16 47 09" src="https://user-images.githubusercontent.com/22980972/229296206-d2f03d85-3772-4934-a69a-7f9ec870ba70.png">

the project is seperated in 2 parts front and back,

cd into calculator-api and follow these steps:
`composer install`, 
create a `.env` with a db name, 
run `php artisan key:generate`,
`php artisan migrate`

-------------------------

cd into calculator-front:
`npm install`,
in the root project in `baseUrl.js` file change the `CALCULATOR_API` to match the api url,
then run `npm run serve`
