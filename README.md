API | Slim, RedBeansPHP
=========================

A learning project for [Slim][1] and [RedBeansPHP][2] ORM. It uses [Composer][3].

While using `Composer`, make sure you are using the latest version of PHP CLI and `Composer` binary.



```
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require slim/slim:"4.*"
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require slim/psr7

sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require illuminate/database "~5.1"
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require propel/propel "~2.0@dev"
```



### .htaccess

`.htaccess` in the application root folder

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

### The call to API


`index.php/apix/` : call without `.htaccess`
`apix/` : call with `.htaccess`

`http://localhost:8888/3_study/4_php/study_005_slim/2_slimApp/public/apix/`
`http://localhost:8888/3_study/4_php/study_005_slim/2_slimApp/public/index.php/apix/`


### RedBeanPHP

 - Database conversation is by `beans`
 - Every `bean` has a `type` and `id`
 - The `id` is the `primary key` of the corresponding record
 - RedBeanPHP will keep changing the `schema` to fit your needs, this is called 'fluid mode'.



### API

 - Meeting : http://localhost:8888/3_study/4_php/study_005_slim/3_slimApp/public/api/v0/meeting/add/
 - User    : http://localhost:8888/3_study/4_php/study_005_slim/3_slimApp/public/api/v0/user/add/
 - Present : http://localhost:8888/3_study/4_php/study_005_slim/3_slimApp/public/api/v0/present/mark/






[1]: https://www.slimframework.com/
[2]: https://www.redbeanphp.com
[3]: https://getcomposer.org/



















