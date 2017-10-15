<p align="center"><a href="https://the-control-group.github.io/voyager/" target="_blank"><img width="400" src="https://s3.amazonaws.com/thecontrolgroup/voyager.png"></a></p>

<p align="center">
<a href="https://travis-ci.org/the-control-group/voyager"><img src="https://travis-ci.org/the-control-group/voyager.svg?branch=master" alt="Build Status"></a>
<a href="https://styleci.io/repos/72069409/shield?style=flat"><img src="https://styleci.io/repos/72069409/shield?style=flat" alt="Build Status"></a>
<a href="https://packagist.org/packages/tcg/voyager"><img src="https://poser.pugx.org/tcg/voyager/downloads.svg?format=flat" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/tcg/voyager"><img src="https://poser.pugx.org/tcg/voyager/v/stable.svg?format=flat" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/tcg/voyager"><img src="https://poser.pugx.org/tcg/voyager/license.svg?format=flat" alt="License"></a>
<a href="https://github.com/larapack/awesome-voyager"><img src="https://cdn.rawgit.com/sindresorhus/awesome/d7305f38d29fed78fa85652e3a63e154dd8e8829/media/badge.svg" alt="Awesome Voyager"></a>
</p>

# **V**oyager - The Missing Laravel Admin
Made with ❤️ by [The Control Group](https://www.thecontrolgroup.com)

![Voyager Screenshot](https://s3.amazonaws.com/thecontrolgroup/voyager-screenshot.png)

Website & Documentation: https://laravelvoyager.com

Video Tutorial Here: https://laravelvoyager.com/academy/

Join our Slack chat: https://voyager-slack-invitation.herokuapp.com/

View the Voyager Cheat Sheet: https://voyager-cheatsheet.ulties.com/

<hr>


<p align="center">
	<img src="https://i.imgur.com/yVP39rQ.png">
</p>
Laravel Admin & BREAD System (Browse, Read, Edit, Add, & Delete) & Blog, supporting Laravel 5.4 and newer!
Build with Voyager Admin Package & ready update if voyager update

## Installation Steps

### 1. Require the Package

After creating your new Laravel application you can include the Voyager package with the following command: 

```bash
composer require ken/laravel-voyager-blog
```

### 2. Add the DB Credentials & APP_URL

Next make sure to create a new database and add your database credentials to your .env file:

```
DB_HOST=localhost
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

LITEPIE_PREFIX=your/dashboard
LITEPIE_NAME=litepie
LITEPIE_APP_NAME=litepie
LITEPIE_DESCRIPTION="Description Your App"
LITEPIE_BUILDING="Jakarta, Indonesia"
```

You will also want to update your website URL inside of the `APP_URL` variable inside the .env file:

```
APP_URL=http://localhost:8000
```

> Only if you are on Laravel 5.4 will you need to [Add the Service Provider.](https://voyager.readme.io/docs/adding-the-service-provider)

and adding 
```
Ken\Blog\LitepieServiceProvider::class,
```

### 3. Automaticly Install Voyager
```
php artisan litepieweb:install
```
open config/voyager.php and change like this
```
'additional_css' => [
   'vendor/litepie/css/custom.css',
],

'additional_js' => [
   'vendor/litepie/js/tinymce.min.js',
],
```
> Troubleshooting: **Specified key was too long error**. If you see this error message you have an outdated version of MySQL, use the following solution: https://laravel-news.com/laravel-5-4-key-too-long-error

And we're all good to go!

Start up a local development server with `php artisan serve` And, visit [http://localhost:8000/your/dashboard](http://localhost:8000/your/dashboard) for akses admin page

Thanks to the control group