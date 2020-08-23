# Tibetan Settlement of Delhi - DBMS


## Requirement:

|  Name | Version |
| ------------- | ------------- |
| PHP  | > 7.2   |
| MySQL | >= 8  |

## Development 

1. Install virtualbox and run 

        vagrant up 

2. Hit: http://192.168.10.10/admin/


## Useful Commands

```bash
php artisan make:migration create_settlements_table
php artisan migrate
php artisan db:seed
php artisan db:wipe
composer dump-autoload
php artisan make:seeder SettlementSeeder

```



