<h2>How To Configure</h2>
- git clone https://github.com/sakibmd/recipe-site-laravel-6.x.git <br>
- composer i <br>
- php artisan key:generate <br>
- php artisan migrate <br>
- php artisan db:seed <br>
- npm i <br> <br>

then change filename .env-example to .env <br>
- Add Database Name <br>
- Create Mailtrap Account (for use locally) <br>
- Configure mailtrap username & password for users email verification. <br><br>

Here is an example: <br>
MAIL_MAILER=smtp <br>
MAIL_HOST=smtp.mailtrap.io<br>
MAIL_PORT=2525 <br>
MAIL_USERNAME=your_username <br>
MAIL_PASSWORD=your_password <br>
MAIL_ENCRYPTION=tls <br>
MAIL_FROM_ADDRESS=demo@gmail.com <br>
MAIL_FROM_NAME="Demo Project" <br><br>

Then, <br>
php artisan config:clear <br>
php artisan config:cache <br>
php artisan storage:link <br>
php artisan serve <br>

