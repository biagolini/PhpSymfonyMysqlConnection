# Creating a Symfony application that access MySQL locally

This tutorial demonstrates how to connect a PHP Symfony application to a MySQL database to query data and display the results in an HTML table. Symfony is a popular PHP framework for building web applications, while MySQL is a widely-used open-source relational database management system. This combination allows for the efficient development of database-driven web applications.

## Requirements

Before you begin, ensure you have the following requirements:

- Ubuntu 22.04 or higher
- MySQL 8.0 or higher
- PHP 8.1. or higher
- Composer 2.5 or higher
- Symfony 5.5 or higher

## Bulding the application

Step 1. Ensure your dependencies are correctly installed.

```bash
aws --version
git --version
apache2 -v
php --version
php -m # php extension
composer --version
symfony -V
```

Step 2. Configure your Git credentials.

```bash
git config --global user.email "your_email@example.com"
git config --global user.name "Your Name"
```

Step 3. If you do not have a database yet, create a new one like the one presented in the [database.sql.example](database.sql.example) file.

Step 4. Create a Symfony Application.

```bash
symfony new PhpSymfonyMysqlConnection --webapp
```

Step 5. Ensure your project has the required dependencies (e.g., Doctrine and the MySQL driver).

```bash
composer require symfony/orm-pack
composer require symfony/maker-bundle --dev
composer require doctrine/doctrine-bundle
composer require doctrine/doctrine-migrations-bundle
composer require symfony/apache-pack
```

Step 6. Configure the .env file.

Open .env in the root folder of your application.

```bash
cd /path-to-project/
nano .env
```

Update the DATABASE_URL with your database connection information:

```
DATABASE_URL="mysql://${USERNAME}:${PASSWORD}@${HOST}:${PORT}/${DBNAME}?serverVersion=5.7""

```

For instance

```
DATABASE_URL="mysql://root:SuaSenha@localhost:3306/CustomerData?serverVersion=5.7"
```

Note: If you are running this tutorial in a WSL environment, where Symfony serve will run on WSL and MySQL runs on Windows, you must refer to the database host as the local IP of Windows. To check your local IP, use:

```
ipconfig
```

In response, search for: Ethernet adapter Ethernet / Connection-specific DNS Suffix / IPv4 Address

Step 7. Test if your database configuration is correct using the following command.

```bash
php bin/console dbal:run-sql 'SELECT \* FROM tbltypestate'
```

Step 8. Create a TypeState entity.

Run the following command to create a new TypeState entity. After running the following command, a new file will be found in src\Entity\ENTITY_NAME.php (i.e., src\Entity\TypeState.php)

```bash
php bin/console make:entity TypeState
```

Develop TypeState.php to describe the given Entity. For doing so, check my code presented in the [src\Entity\TypeState.php](src\Entity\TypeState.php) file.

Step 9. Add a Controller.

Create a StateController using Symfony CLI. After running the following command, a new Controller will be found in src\Controller\NAMEController.php (i.e., src\Controller\StateController.php).

```bash
symfony console make:controller State
```

Develop StateController to display a regular and a custom hello message. For doing so, check my code presented in the [src\Controller\StateController.php](src\Controller\StateController.php) file

9. Develop Twig files. For doing so, check [templates\base.html.twig](templates\base.html.twig) and [templates\state\index.html.twig](templates\state\index.html.twig) files.

## Testing the Application Locally

Test run Symfony serve.

```
symfony serve --port=8080
```

Open your browser and test the application by accessing the following URLs.

```
http://localhost:8080/
```

## Contributing

Feel free to submit issues, create pull requests, or fork the repository to help improve the project.

## License and Disclaimer

This project is open-source and available under the MIT License. You are free to copy, modify, and use the project as you wish. However, any responsibility for the use of the code is solely yours. Please use it at your own risk and discretion.
