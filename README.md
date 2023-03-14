# CINV-Academy
CINV Academy is an Educational open source web application designed to bring learning closer to users by creating a convenient means of interaction, discussion, and reading.

### Composer package manager
This project uses composer to manage third party library dependencies. The following steps illustrates how to install composer and fetch dependencies

Install Composer
``` bash
curl -sS https://getcomposer.org/installer | php
```

Install composer dependencies
``` bash
php composer.phar install
```

### Database connection
Please follow these steps to connect the project to the MSSQL Database in Azure.
1. Rename the `example.config.env` to `config.env`. You can find the file in the root folder of the project.
1. In the `config.env` file, change the password from `<GetPasswordFromNick>` to the real password Nick provided in the Discord channel.

For more insight on how the code works, see this section in [util.php](https://github.com/CINV-Project/CINV-Academy/blob/main/lib/utils.php#L9-L42). the function `get_config` reads the fields from the `config.env` file.

*Note* If you're running on a windows machine you need to [Install the SQL Server Driver for PHP](https://learn.microsoft.com/en-us/iis/application-frameworks/install-and-configure-php-on-iis/install-the-sql-server-driver-for-php)


### Tailwind CSS
To ease frontend development, we make use of [tailwind css](https://tailwindcss.com/docs) in the project. To install follow these [steps](https://tailwindcss.com/blog/standalone-cli)

Sample build command
``` bash
scripts\tailwindcss.exe -i static/css/tailwind.css -o static/css/build.css --watch
```