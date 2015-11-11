# cakeAdminLTE
A minimal admin panel in [cakephp](http://cakephp.org/) using adminLTE
All the application need a admin panel/interface to manage and keep an eye on the application parts, for this we need a interface for admin
[AdminLTE](https://almsaeedstudio.com/preview) is the best admin panel theme that can be used with any application.

##Download
first clone this folder with in your system or download the zip or you can either use composer to directly install all the dependencies [cakeAdminLTE](https://packagist.org/packages/yash/cake-admin-lte) using packgist.

##Schema
After download your have to first install the schema, you can either use cake shell to install schema using
```
$ Console/cake schema create
```
or you can directly import admins.sql (`app/Config/admins.sql`) file in your database.

##Intialize the application
Now hit the url `http://localhost/cakeAdminLTE/admin` you are ready to go, enter the username is admin and password is 123456

####CakeAdminLTE
* cakeAdminLTE is already built with auth authentication system within the admin panel along with admin routing. 
* open file `app/Controller/AppController.php` which is already set up using auth component for admin authentication.
* you can use auth for authentcating user within the else part, you will find all information [here](http://stackoverflow.com/questions/13167367/cakephp-2-x-auth-with-two-separate-logins).
* by default if you run the application it will look for the controller, so you have to use `/admin` after the application name if you have not setup any other default controller.
