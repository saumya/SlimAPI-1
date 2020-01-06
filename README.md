Slim App
=================


```
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require slim/slim:"4.*"
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require slim/psr7

sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require illuminate/database "~5.1"
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_1.9.1.phar require propel/propel "~2.0@dev"
```



### Note

`.htaccess` in the application root folder

```
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^ index.php [QSA,L]
```

### Note - the call to API


`index.php/apix/` : call without `.htaccess`
`apix/` : call with `.htaccess`

`http://localhost:8888/3_study/4_php/study_005_slim/2_slimApp/public/apix/`
`http://localhost:8888/3_study/4_php/study_005_slim/2_slimApp/public/index.php/apix/`
```





