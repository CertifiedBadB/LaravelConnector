<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://play-lh.googleusercontent.com/XXqfqs9irPSjphsMPcC-c6Q4-FY5cd8klw4IdI2lof_Ie-yXaFirqbNDzK2kJ808WXJk" width="400" alt="Laravel Logo"></a></p>
<p align="center">
<a href="https://www.linkedin.com/in/jordy-huijgens-319406250/"><img src="https://img.shields.io/badge/LinkedIn-blue" alt="Mail me!"></a>
<a><img src="https://komarev.com/ghpvc/?username=certifiedbadb&style=flat-square&color=blue" alt=""/></p></a>
    
</p>
<p align="center">
<a href="mailto:jordy.huijgens@outlook.com"><img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Mail me!"></a>
</p>
    
## Introduction


 _Hello there! I'm Jordy Huijgens, and I'm exited to present my work on this backend assignment. I've embarked on this assignment with the goal of showcasing my skills and enthusiasm for joining your team. I believe 
 this project not only demonstrates my technical capabilities but also reflects my commitment to delivering high-quality, well-structured code that aligns with industry standards. I'm excited to dive into this 
 project and showcase my abilities.  
 I'll be diligently working on this assignment, pushing regular updates to my private GitHub repository. Feel free to reach out if you have any questions or require further clarification on any aspect of my work. C;
 Thank you for considering me for this opportunity. I look forward to the possibility of contributing to your team!_

 I am willing to put some more time in it. The time I already have put in this project is around 18 hours, including watching tutorials to learn Laravel. I am happy with my results aspecially on the MovieController. 
 
 I think my functions are a bit to big on the SeriesController, But im glad I did a Laravel Project, it was very fun, and great to learn.
 
## Token
The bearer token is saved in the .env (I will add a example.env) file and is called:
``` 
TMDB_API_TOKEN
``` 
If this was a actually application getting pushed to production I should save it on another place. (Depends on where you host your application)

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
Each create-database file also has a button for deleting ther database, for debugging purposes.

## Controllers

The controllers are made using artisan like:
``` 
php artisan make:controller MovieController
php artisan make:controller SeriesController
```

### movieController

The moviecontroller gets a list of populair movies, and if you cannot connect to the database you will get a exception.
After that follows a try,catch block with a exception if there are any other problems while creating the records in the database.
I loop through each movie using a foreach loop.
I check if a movie already exists in the database, and insert the movie if it doesnt exists yet.
Also I create 2 arrays for the return value, 1 containing added records and 1 containing records that wont get added in case of data duplication.

# How to use

Open a terminal and go to the project location, start typing:

``` 
php artisan migrate
```

Now your SQLlite database is created.

After this you can start the application using:

``` 
php artisan serve
```
to add and delete movies to the database go to:
``` 
url/movies/create
```

to add and delete series to the database go to 
``` 
url/series/create
```


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
