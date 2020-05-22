----------------INSTALLATION-----------------------------

You can run this project in 2 ways :

1) MANUALLY :
- Clone this repository from github
(composer has to be installed)
- Run script - 'composer install'
- Create mysql database.
- Create config/local.db.php. with your credentials
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
- Run script - 'php yii migrate'

Now you have to config your web server(apache, nginx) to root - web/ OR
you can run php server - "php -S localhost:8888" (port you can change)

------------READY----------------------------------

- DOCKER(if you have docker + docker-compose installed)


            It will be done later


-------------API-DOCUMENTATION---------------------

Requests and responses will be in JSON format.

1task =>  creates / updates / deletes E-stations;



 - create => {your host}/api/stations/create 
 
      PARAMS POST(all required, except 24h) - 
      
            1) 'city' - string 
            
            2) 'address'(unique) - string 
            
            3) 'opening_time', - time (only in format "HH:mm")
            
            4) 'closing_time' - time (only in format "HH:mm")
            
            5) (optional)'24h' - boolean (default value - false, if you want to create station which works round the clock you have to send TRUE, in opening_time and closing_time you should send 00-00)
            
      RETURN - new object of Station      
        
- update => {your host}/api/stations/update

        PARAMS POST -(required only id) - 
        
                    1) 'id' - integer (id of updating station )
                    
                    1) 'city' - string 
                    
                    2) 'address'(unique) - string 
                    
                    3) 'opening_time', - time (only in format "HH:mm")
                    
                    4) 'closing_time' - time (only in format "HH:mm")
                    
                    5) '24h' - boolean
                    
        RETURN - updated object pf Station
                    
- delete => {your host}/api/stations/delete       

        PARAMS POST (required)
        
        1) 'id' - integer (id of station for delete) 
        
        RETURN - true(if succeed).
            
2task => displays stations in the specified city (Kyiv, Odessa, Lviv…);

    route - {your host}/api/stations/get-stations-by-city  
    
    PARAMS POST - 'city' string. 
    
    RETURN array of objects OR empty array.
    
3task => displays stations in the specified city that are currently open;

Bookmark - In this assignment, we must consider time zones. For different realizations of timeZones problems I have to
discuss this with frontMen. But I think this problem is beyond the scope of this testTask :-)
That`s why I use UTC.

    route - {your host}/api/stations/get-stations-by-city-which-currently-open
    
    PARAMS POST - 'city' string. 
    
    RETURN array of objects OR empty array.

4task => (Optional) displays the closest E-station that is currently open.

If I understand correctly this task, we have to use some external API (maybe GoogleMaps) that will
find your geolocation. Then we have to add several fields to table "stations" or maybe new table for geodata of e-stations.
Then we have two decisions of this problem - 
    1) We take this geodata from request and put into table
    2) We will find api or write own code that will find geodata from address, thaw we take from table.
Also, we need to store right format of address. 
I think it will be very interesting task, that we can do together :-)
    
    