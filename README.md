#Mini blog laravel



## guide d'installation Laravel

### Download Composer

#####Windows Installer

In a first we must install the software "Composer". This software allows you to manage the different dependencies of the Laravel framework.

To do this, you must download the executable "Composer-Setup.exe" from the application on the following site: [Download Composer](https://getcomposer.org/download/).

#####Command-line installation

```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e0012edf3e80b6978849f5eff0d4b4e4c79ff1609dd1e613307e16318854d24ae64f26d17af3ef0bf7cfb710ca74755a') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

### Steps to download Laravel

Once "Composer" installed, you must now install the Laravel framework. To do this, open the command line and type the following command:

```bash
composer global require laravel/installer
```

Once installed, the laravel new command will create a fresh Laravel installation in the directory you specify. 
For instance, laravel new blog will create a directory named blog containing a fresh Laravel installation with all of Laravel's dependencies already installed:

```bash
laravel new blog_projet
```

###### Local Development Server

If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command. 
This command will start a development server at http://localhost:8000


```bash
php artisan serve
```

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Home](http://127.0.0.1:8000)**
- **[Articles](http://127.0.0.1:8000/article)**
- **[Contacts](http://127.0.0.1:8000/contact)**
- **[Administrateur](http://127.0.0.1:8000/admin)**
- **[Utilisateurs](http://127.0.0.1:8000/user)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## Usage

```laravel
import foobar

foobar.pluralize('word') # returns 'words'
foobar.pluralize('goose') # returns 'geese'
foobar.singularize('phenomena') # returns 'phenomenon'
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.


## Authors
siwar zaied

## License
[MIT](https://choosealicense.com/licenses/mit/)