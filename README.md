THIS CODE IS DIRTY because I didn't originally think of making it public. But a friend saw how it worked and wanted to use it too, so then I figured that maybe other people will want to use it too.

This script reads your profile and posts from Pixelfed (on the Fediverse) and Bluesky (Atproto) and adds up followers and post likes. Very similar to what politicalmemes.org does on those profiles. This way, you can share your website rather than separate Fedi and Atproto profiles to people, and they can see what you post without logging in and click to the network they prefer.

This project is open source and you are very welcome to make changes to your desires/needs. Have fun with it!

HOW TO USE:
Upload the files to your webserver. Only index.php and post.php need to be accessible to the public, but the other files need to be accessible to index.php. Change the variables to whatever applies to you (Fedi instance + username + API token, Atproto username). Create a cronjob that, as often as you want the page to refresh, executes the following command:

php /path/to/atomreader.php > /path/to/output.php

That's it.
