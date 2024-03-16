# LaraGigs app

An app for listing Laravel jobs. Made with [Laravel 11](https://laravel.com/docs/11.x/releases#laravel-11).

![Alt text](/public/images/ss.png "LaraGigs")

## Usage

### Database Setup
This app uses `SQLite`. To change this, open up the `.env` file and change the default database driver.

To use `MySQL`, make sure you install it, setup a database and then add your db credentials (`database`, `username` and `password`) to the `.env`.

### Migrations
To create all the necessary tables and columns, run the following:
```shell
php artisan migrate
```

### Seeding The Database
To add the dummy listings with a single user, run the following:
```shell
php artisan db:seed
```

### File Uploading
When uploading listing files, they go to `'storage/app/public'`. Create a symlink with the following command to make them publicly accessible:
```shell
php artisan storage:link
```

### Running The App
Start your web server, and run the following:
```shell
php artisan serve
```

## Credits
Written alongside [Brad Traversy's Laravel Crash Course](https://www.youtube.com/watch?v=MYyJ4PuL4pY).

## License

The LaraGigs app is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
