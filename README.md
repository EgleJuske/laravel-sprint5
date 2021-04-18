# Project manager (CRUD) application

## About application

This application is for educational purposes. This app is built with Laravel framework. With this project manager app you can create, read, update and delete employees and projects. You can assign projects to employees.

## Deployment procedure:

1. Clone this git repository or download and extract ZIP folder
2. Move folder to this directory C:\Program Files\Ampps\www
3. Start Apache and MySQL using Ampps
4. Create new Schema 'sprint5' in your database
5. This app requires you to have **Composer** and **Doctrine** installed:
    - Install [Composer](https://getcomposer.org/download/) (install it locally in `\www` directory)
    - Go to the downloaded app folder and run this command in terminal `php ../composer.phar install`
    - To install **Doctrine** run this command in terminal `php composer.phar require doctrine/orm`
6. Run command in terminal `php artisan migrate` to create tables in database.
7. Run command in terminal `php artisan db:seed` to add data to the tables.
8. Run command in terminal `php artisan serve` and follow the link that is generated.

## Launch procedure:

Once you apen the app in your browser, login will be required.

**Log in information:**  
Username: admin
Password: adminadmin

Employees page:

-   Add new employee
-   Assign project to employee
-   Delete employee
-   Update employee name, surname, assigned project

Projects page:

-   Add new project
-   Delete project (only if no employees are assigned to the project)
-   Update project title and info

## Authors

[Egle](https://github.com/EgleJuske/)
