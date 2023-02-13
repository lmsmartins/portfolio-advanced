# Portfolio Advanced

This is a portfolio web application built using Yii2's Advanced Application Template, developed as part of
the [Yii 2: From Beginner to Expert](https://www.udemy.com/course/yii-2-from-beginner-to-expert/?referralCode=90749EB6EAA81B686777)

The database dump, which includes both structure and data, can be found in the "database" directory.

## 👉 Installation

### Step 1: Install dependencies using Composer
To run the command "composer update", follow these steps:

1. Open your terminal or command prompt.
2. Navigate to the root directory of your project. You can use the "cd" command to change the directory. For example, if your project is located in the "C:\XAMPP\htdocs" directory, you can use the following command:

   `cd C:\XAMPP\htdocs`
4. Once you are in the project directory, type "composer update" and press enter. This will start the process of updating your project dependencies.

   `composer update`
6. Wait for the command to finish executing. It may take a few minutes to complete, depending on the size of your project and the number of dependencies.
7. After the command has completed, you should see a success message indicating that the dependencies have been updated.


### Step 2: Environment variables
In the project's root directory you should see a ".env.example" file. Rename this file to .env, since this web application relies on environment variables for setting up the database connection.

### Step 3: Setup the application
1. Execute the following command:

   `php init`

2. Choose "0" for Development environment or "1" for Production environment, and press enter.
3. Type "yes" do confirm and press enter.
4. After the command has completed, you should see a success message indicating that the initialization has been completed.

### Step 4: Database
#### Option 1 - Using migrations:
1. Execute the following command to create the tables necessary to use RBAC (Role Based Access Control):

   `yii migrate --migrationPath=@yii/rbac/migrations`

    If you get an error, try adding "php" at the beginning of the command and press enter:

   `php yii migrate --migrationPath=@yii/rbac/migrations`

2. Apply the app's migrations through the following command:

   `yii migrate`

   If you get an error, try adding "php" at the beginning of the command and press enter:

   `php yii migrate`

3. Type "yes" to confirm, and press enter.

#### OR
#### Option 2 - Import the database created during the course:

To import the database created during the course, please follow these steps:

1. Open PHPMyAdmin in your web browser by visiting "http://localhost/phpmyadmin/" (assuming you have XAMPP installed on your local machine).
2. In the left-hand panel, click on the database where you want to import the database dump file. If you haven't created a database yet, you can do so by clicking on the "Databases" tab and entering a name for the database.
3. Once you are inside the database, click on the "Import" tab.
4. Under the "File to import" section, click on the "Choose File" button and select the "database/portfolio.sql" file.
5. Finally, click on the "Go" or "Import" button.

The database import process may take a few minutes, depending on the size of the database and the speed of your computer. Once the process is complete, you should see a success message indicating that the database has been imported successfully.
If you encounter any issues during the import process, you can check the PHPMyAdmin error log for more information.

## Deployment using Docker (optional)
If you plan to use docker, don't forget to rename the docker-compose.example.yml file to docker-compose.yml after deploying this repository to your development or production environment.
