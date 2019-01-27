#Threads Board

To install the project:
 - clone repository content
 - run composer install
 - create the `.env` file by making copy of `.env.example` file
 - update `.env` with your credentials (db name, user, password etc)
 - run `php artisan key:generate` to generate application key
 - run database migrations by using `php artisan migrate`  
 - run seeder to create roles and admin account by `php artisan db:seed`
 - run `php artisan serve` to run the server
 - enjoy!
 
 
 You can easily register as many new users as you want. Admin is strictly one and can be created only via seeder.
 To log in as an admin next credentials to be used:
 - email: admin@threads.com
 - password: admin
 
 If you by any chance are lazy as I am to create test data via manual clicking - there is the lifehack:
 `php artisan db:seed --class=AppDataSeeder`. This command will generate multiple threads, users and replies to check application with data.
 
 
 
 Couple words regarding the structure:
 To track amount of threads per user and notify thread author regarding replies event have been used.
 Most part of creation logic is placed inside ThreadService.
 Meantime the were no tricky or sophisticated queries to introduce repositories pattern, that's why within this test task I fetched data directly from Controller using Eloquent. But definitely would do so in real project.
 
 ThreadService is covered with unit tests. As well e2e tests to be introduced, but it is supposed to be out of the scope of the test.