## About Laravel

Laravel scores better than other web frameworks because of its advanced features and development tools that facilitate rapid web application development.



## Why Laravel

- **MVC Architecture For Exceptional Support & Performance** <br>
  - Laravel comes with the model-view-controller (MVC) architectural pattern. It is easy to use and thus offers an extremely convenient way to build large or small business applications. With it, web artisans can organize big projects with more than five files for improved maintainability.
  - When you have to work on a large project, you have to deal with a lot of unstructured code. Using MVC can simplify your coding structure and make it easier for you to work with.
- **Template Engine For Outstanding Layouts**
  - Laravel comes with the Blade templating engine. It’s a powerful, lightweight, and pre-installed template engine that helps web developers make the process of development smooth and easy with its outstanding layouts.

  - The Blade template engine allows data display and extending layouts without affecting the application's performance and speed. It helps you create innovative and amazing layouts using the feature of content seeding.
- **Eloquent ORM For Easy Interaction With App Database**
  - ORM stands for object-relational mapper, and Laravel’s Eloquent ORM is awesome. As the name suggests, it allows you to maintain an easy interaction with your app database objects using an eloquent or expressive syntax.


## About the project
  This is a very simple blog with authentication and authorization systems.<br>
    It came with three main roles. ``admin`` ``author`` ``user``
    that manage the actions that will done in the website .<br>
    also it came with simple **RESTful API**.
  
## Steps to start working

- clone the repo from [github](https://github.com/Ahmedazeem98/fatura.git)
- create database such as **fatura**
- Then go inside fatura folder and follow these steps
  - run **composer install**
  - **rename** .env.example to .env and set database configs
  - run **php artisan migrate**
  - run **php artisan db:seed**
  - run php artisan serve to start the server and open the given link.<br><br>


- now you have three accounts with different roles
  - We have three main roles: admin, author, user
    - admin: can create edit delete any post or user
    - author: can create posts and edit only his own posts
    - user: can only read the blog posts
  - Initially we have three accounts with password: ``pass123`` for test
    - admin@admin.com
    - author@author.com
    - user@user.com <br><br>
- The first thing to do you have to logged in with test accounts or create new account.
- Then you can do every thing based on the account roles.<br><br>


- The registration system working by:
  - Name
  - Unique **Email**
  - **Password** not less than 6 characters. <br><br>
  - You have to know that `admin` can delete or edit the users accounts.

- The login system working by:
  - your **email** and **password** you registered with. <br><br>

- Posting operations:
  - You must have `admin` or `author` role so that you can create post.
  - The post title is `unique`
  - `admin` only can delete or edit any post.
  - `author` only can create, edit and delete his own posts.
  - `user` only read posts.

  
- let's talk about the API how and how it's working:
  - **ApiKey** is: ``i9Ey9mlq7qcrCjHH8Rpe1U42OEWZeiuKOIuoHIiTr59GHJvYSvMYEDtRXwBs`` you will can't make calls without it.
  - You must send the api key as parameter key `api_token` in request **headers**
  - We have **three** api routes:
    - **_api/posts_** with ``GET`` method this will **get** all posts in our blog.
    - **_api/posts/{post_id}_** with ``GET`` this will **get** specific post based on the id.
    - **_api/posts/{post_id}_**  with ``DELETE`` this will **delete** specific post based on the id.<br><br>

