# SiteRedirect2
Redirect your users to another site with Google FireBase

It does the same thing the first version of [Site Redirect](https://github.com/dms98/SiteRedirect) , but now counts the number of accesses each URL and stores the data in a [Google Firebase Database](https://firebase.google.com).


To work put all this files on root of your webserver.


**FILES**

vai.php - Where you  put yours alias and urls.

redir2.php - the main program. You need to put your database url inside this file.

htaccess - rename to .htaccess - This file tells to webserver to use redir2.php

index.html - put there any message that you want to show when use an url without parameters.

**Additional instructions**

1 - Create an account on Google Firebase. [firebase.google.com](http://firebase.google.com)

2 - Create a new database.

3 - In Realtime Database section, create a new item inside your new database. Name this item "acessos".

![]({{site.baseurl}}//fb1.png)

4 - In Realtime Database section, edit the database access rules.

![]({{site.baseurl}}//fb2.png)
