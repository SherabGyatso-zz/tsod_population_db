<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

# Tibetan Settlement of Delhi - DBMS


## Requirement:

|  Name | Version |
| ------------- | ------------- |
| PHP  | > 7.2   |
| MySQL | >= 5.5 |
| Virtualbox | >= 6.0 (Only for development) | 

## Development 

1. Clone 

        git clone git@github.com:SherabGyatso/tsod_population_db.git

2. Update your project directory location at (Homestead.yaml Line:13)(./Homestead.yaml#13)


3. Install virtualbox and run 

        vagrant up 

4. Access home page at http://192.168.10.10

5. Your project folder is synced with `/home/vagrant/code` directory of the VM. So any updates are auto reflected. 

6. Enjoy development 😎


## Useful Commands


| Command  | Description |
| ------------- | ------------- |
| `php artisan make:migration create_users_table`  | Create a db migration file |
| `php artisan make:seeder UserSeeder` | Create seeder file |
| `php artisan migrate`  | Apply migrations |
| `php artisan db:seed`  | Seed database | 
| `php artisan db:wipe`  | Clear database | 
| `composer dump-autoload` | Reload newly added files | 



