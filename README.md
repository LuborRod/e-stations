You can run this project in 2 ways :

- MANUALLY :
1) Clone this repository from github
(composer has to be installed)
2) Run script - 'composer install'
3) Create mysql database.
3) - Create config/local.db.php. with your credentials
```
       <?php
       return [
           'class' => 'yii\db\Connection',
           'dsn' => 'mysql:host=??????;dbname=???????',
           'username' => '??????',
           'password' => '??????',
           'charset' => 'utf8mb4',
       ];
```
4) Run script - 'php yii migrate'

------------READY----------------

- DOCKER

        
    