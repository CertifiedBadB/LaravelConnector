<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://play-lh.googleusercontent.com/XXqfqs9irPSjphsMPcC-c6Q4-FY5cd8klw4IdI2lof_Ie-yXaFirqbNDzK2kJ808WXJk" width="400" alt="Laravel Logo"></a></p>

## Hi..
My name is Jordy Huijgens, and I am a Junior Software developer.
## Migration
The migrations are made using artisan like:
``` 
php artisan make:migration Movies
php artisan make:migration Series
php artisan make:migration Seasons
php artisan make:migration Episodes
``` 
## Models 

The models are made using artisan like: 
``` 
php artisan make:model Movie
php artisan make:model Series
php artisan make:model Season
php artisan make:model Episode
```

## Views

The views are made by using the following conventions:

- each subject gets its own folder (Movies, Series)
- the files are named as follows: 'action'-blade.php

So for instance in the Movies folder there will be a create-blade.php, this is used to create the local database records.

## Controllers

The controllers are made using artisan like:
``` 
php artisan make:controller MovieController
php artisan make:controller SeriesController
```

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
