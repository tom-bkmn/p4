p4
==

###Tom Beikman's P4 assigment for Dynamic Web Applications, CSCI E-15

• Live URL of the final project:
 [p4.tombeikman.me](http://p4.tombeikman.me)
 
• Project description: This project is an implementation of a basic blog application.  The project is called TBen's Blog.  The blog supports the following features:

1. User authentication.  All users must have an account.
2. Topic, reply and comment support.  One Topic supports multiple replies, each reply supports multiple comments. For all topics, the last created item is listed first on the page.  Replies and comments, however, list oldest entries first - newer entries are last.
3. Administrator role.  The admin user has special options for deleting topics and editing replies (satisfies the DELETE and PUT database CRUD requirement).
4. Image upload in replies.  Image files can be uploaded and displayed in replies.  However, there is a 2.07 meg filesize limit! (I'm not entirely sure why-and i can't override it.)
5. Input validation and error messaging on all fields on all panels (signup, login, topics, replies and comments).
6. HTTP 404, 403, and 500 error pages with optional actions (return to app or logout).
 
• Demo information:  I recorded the demo using Jing and uploaded to screencast.com.
Watch the demo here: http://screencast.com/t/v6OXrjKytxfa
 
• Additional authentication details:

1. A sign-up page is supported to create new accounts.  The login page has a link to the sign-up page and vice versa.
2. Login requires an email address and password.
3. Prior to login, application routes are not available.
4. After login, no access is available to login and signup routes.
5. Logout is supported.

• Account details:  Ready made test accounts are available:

1. Regular user: user1@metrocast.net   password: user1
2. Admin user: admin@metrocast.net   password: admin1
 
• Third party resources acknowledgment: I included Pre into the project.

1. Pre: https://packagist.org/packages/paste/pre

** Just remember: There's filesize limit for images of 2.07 meg!