# WebTest

To install:

(If you are using Vagrant Composer must be run on the Vagrant box and NPM on the hosting machine).

git clone https://github.com/someguy1984/WebTest.git

Move .env.example to .env

composer install

npm install

npm run dev

Test Cases:

A few Test cases have been established; to run do not use a global install of PHPUnit and run from the Laravel install:
php vendor/phpunit/phpunit/phpunit

php vendor/phpunit/phpunit/phpunit
PHPUnit 7.3.4 by Sebastian Bergmann and contributors.
 
 ...                                                                 3 / 3 (100%)
 
 Time: 238 ms, Memory: 10.00MB
 
 OK (3 tests, 3 assertions)
 

