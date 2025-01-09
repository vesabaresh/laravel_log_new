Sir/Mam,

Laravel Task as follows:

Instruction to run the source:
==============================

Step1 (Configure SQLITE database):
----------------------------------
.env file - Change DB_DATABASE to your path 

DB_CONNECTION=sqlite
DB_DATABASE=E:/xampp/htdocs/laravel_log/database/database.sqlite   => Change to your path
DB_USERNAME=null
DB_PASSWORD=null

Step2:
------
php artisan migrate

Step3 (Run Server):
-------------------
php artisan serve


Works implementation:
=====================

SQLITE Database configured in following folder: laravel_log/database/database.sqlite

View sqlite db using : https://inloop.github.io/sqlite-viewer/

1) Created Middleware - LogRequestsMiddleware

2) In .env file by => REQUEST_LOGGER_ENABLED=true

middleware can be easily toggled on and off

3) Table used to write log - request_logs
4) Used "Yajra DataTables" for logs display


- Thanks