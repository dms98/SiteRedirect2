# SiteRedirect2
Redirect your users to another site with Google FireBase

It does the same thing the first version of Site Redirect (https://github.com/dms98/SiteRedirect) , but now counts the number of accesses each URL and stores the data in a Google Firebase database (https://firebase.google.com).


To work put all this files on root of your webserver.


**FILES**

vai.php - Where you  put yours alias and urls.

redir2.php - the main program.

htaccess - rename to .htaccess - This file tells to webserver to use redir2.php

index.html - put there any message that you want to show when use an url without parameters.
