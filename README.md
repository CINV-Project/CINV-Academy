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


### Tailwind CSS
To ease frontend development, we make use of [tailwind css](https://tailwindcss.com/docs) in the project. To install follow these [steps](https://tailwindcss.com/blog/standalone-cli)

Sample build command
``` bash
scripts\tailwindcss.exe -i static/css/tailwind.css -o static/css/build.css --watch
```