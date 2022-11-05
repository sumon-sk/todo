Quick Start:
Clone this repository and install the dependencies.

$ git clone 
$ composer install
Run the command below to initialize. Do not forget to configure your .env file.

$ php artisan migrate
Install node and npm following one of the techniques explained in this link to create and compile the assets of the application.

$ npm install
# Run the Vite development server...
$ npm run dev
 
# Build and version the assets for production...
$ npm run build
Finally, serve the application.

$ php artisan serve
