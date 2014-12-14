p4
==

###Tom Beikman's P4 assigment for Dynamic Web Applications, CSCI E-15

• Live URL of the final project:
 [p4.tombeikman.me](http://p4.tombeikman.me)
 
• Project description: This project is an implementation of a basic blog application.  The project is called TBen's Blog.  The blog supports the following features:

1. User authentication.  All users must have an account.
2. Topic, reply and comment support.  One Topic supports multiple replies, each reply supports multiple comments.
3. Administrator role.  The admin user has special options for deleting topics and editing replies (satisfies the DELETE and PUT database CRUD requirement).
4. Input validation and error messaging on all fields on all panels (signup, login, topics, replies and comments).
5. HTTP 404, 403, and 500 error pages with optional actions (return to app or logout).
 
• Demo information:  I recorded the demo using Jing and uploaded to screencast.com.
Watch the demo here: http://screencast.com/t/
 
• Additional details:  Authentication details:

1. Login is supported through email and password.
2. Prior to login, no access is available to application routes.
3. After login, no access is available to login and signup routes.

• Account details:  Ready made test accounts are available:

1. Regular user: 
2. Admin user: 
 
• Third party resources acknowledgment: I included Pre into the project.

1. Pre: https://packagist.org/packages/paste/pre



