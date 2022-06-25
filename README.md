<h2>How To Configure</h2>
- git clone https://github.com/sakibmd/recipe-site-laravel-6.x.git
- composer i
- php artisan generate:key
- php artisan migrate
- php artisan db:seed
- npm i

then change filename .env-example to .env
- Add Database Name
- Create Mailtrap Account (for use locally)
- Configure mailtrap username & password for users email verification.

Here is an example:
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=demo@gmail.com
MAIL_FROM_NAME="Demo Project"

Then, 
php artisan config:clear
php artisan config:cache
php artisan storage:link
php artisan serve

