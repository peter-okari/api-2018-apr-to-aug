## Stonecold login

>Create a reusable login class taking into consideration most of the possible security threats.

> We will do this using Laravel 🤓 🤓

### Objective
1. Hands on security in PHP(How common vulnerabilities are addressed)
  - Injection
  - Broken Authentication
  - Sensitive Data Exposure
  - XML External Entities
  - Security misconfiguration
  - Cross-Site Scripting
  - Using Components with Known Vulnerabilities
  - Insufficient Logging And Monitoring
2. Laravel 101

### Requirements
- Ubuntu 16.04 LTS
- LEMP / LAMP Stack
- Composer
- Laravel 5.*

#### Installing Ubuntu

Majority of guys are using windows so you will need to choose one of the following options

1. Virtualization
    1. Install VMware Workstation Player
      - [Linux](https://websiteforstudents.com/install-vmware-workstation-player-on-ubuntu-16-04-17-10-18-04-desktop/)
      - [Windows](https://my.vmware.com/en/web/vmware/free#desktop_end_user_computing/vmware_workstation_player/12_0)
    1. [Install Ubuntu on VMware Worstation Player](https://websiteforstudents.com/how-to-install-ubuntu-16-04-17-10-18-04-on-vmware-workstation-guest-machines/)
3. [Dual Boot](https://www.youtube.com/watch?v=qNeJvujdB-0)
3. Cloud Option (DigitalOcean) - Refer to the [Github Student Pack](https://education.github.com/pack) for offer
  - [Create an Ubuntu droplet](https://www.youtube.com/watch?v=irkxCJSOvso)
  - [Secure your droplet : Public/Private Key Auth & Firewall](https://www.digitalocean.com/community/tutorials/initial-server-setup-with-ubuntu-16-04)
  - [Set up HTTPS on your droplet - needs domain name](https://www.digitalocean.com/community/tutorials/how-to-secure-nginx-with-let-s-encrypt-on-ubuntu-16-04) (Bonus 😎 )

#### LEMP / LAMP Stack
- [LEMP - Linux,Nginx,MySQL,PHP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-in-ubuntu-16-04)
- [LAMP - Linux,Apache,MySQL,PHP](https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-on-ubuntu-16-04)

#### [Install Composer](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-16-04)

#### [Install Laravel](https://laravel.com/docs/5.4/installation)

 > NB : Different versions of laravel depend on different PHP versions. Ensure that you install the right one.

 - Laravel 5.2
   - **PHP version between 5.5.9 - 7.1.* **
   - OpenSSL PHP Extension
   - PDO PHP Extension
   - Mbstring PHP Extension
   - Tokenizer PHP Extension
 - Laravel 5.4
    - **PHP >= 5.6.4**
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension

- Laravel 5.6
    - **PHP >= 7.1.3**
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - Ctype PHP Extension
    - JSON PHP Extension

##### How do I install PHP extensions? 🤔 🤔

    sudo apt-get install php-VERSION_NAME-EXTENSION_NAME

    e.g.

    sudo apt-get install php-7.0-xml php-7.0-json


##### Install Via Composer Create-Project

    composer create-project --prefer-dist laravel/laravel FOLDER_NAME "LARAVEL_VERSION"

    e.g

    composer create-project --prefer-dist laravel/laravel stonecold "5.4.*"

> NB: Run laravel as a normal apache / nginx app instead of `$php artisan serve`
> Configure a virtualhost for your laravel app
> [Apache](https://gist.github.com/dj1020/e9898200d82ad9a56c84e3cec644b44b) or [Nginx](https://gist.github.com/enginkartal/04d727d361382dc3d41b)

### Stonecold Login 😜 😜 🤡 🤡

#### MVC Design Pattern (Generic)

Laravel applications follow the traditional **Model-View-Controller** design pattern, where you use:

- *Controllers* to handle user requests and retrieve data, by leveraging Models
- *Models* to interact with your database and retrieve your objects’ information
- *Views* to render pages

In addition to this, routes are used to map URLs to designated controller actions.

A simple workflow is as shown below;

![MVC](../resources/laravel-mvc-simple.png)

[@Source](https://selftaughtcoders.com/from-idea-to-launch/lesson-17/laravel-5-mvc-application-in-10-minutes/)

1. A request is made

    `http://some-laravel-page`
2. The route associated with that URL maps the URL to a controller action.

    `some-page-controller@view`

3. That controller action leverages the necessary model(s) to retrieve information from the database, and then passes that data off to a view.

  `fetch_data from some-page-model`

4. And that view renders the final page.

  `render some-page-view`

> Check this with the default laravel page

> NB : THis is just one of the many juicy features in laravel i.e. it does not explain everything(See Interesting read below) 🤔 🤔


#### [Laravel Directory Structure](https://laravel.com/docs/5.4/structure)

#### Laravel artisan CLI

Artisan is the command-line interface included with Laravel. It provides a number of helpful commands that can assist you while you build your application. To view a list of all available Artisan commands, you may use the list command:

    php artisan list

Some **high level** commands are;

    clear-compiled   Remove the compiled class file
    down  Put the application into maintenance mode
    env  Display the current framework environment
    help  Displays help for a command
    inspire  Display an inspiring quote      list  Lists commands
    migrate  Run the database migrations
    optimize  Optimize the framework for better performance
    serve  Serve the application on the PHP development server
    tinker  Interact with your application
    up  Bring the application out of maintenance mode

#### [(Some) Laravel Security features](http://www.omniceps.com/security-features-laravel-application-security/) 🙂 🙂

#### L5 Application

> At this point you should test that everything works

    On your browser

    http://localhost/URL_TO_LARAVEL_APP/public

    NB : Replace URL_TO_LARAVEL_APP accordingly.

1. Cd to the L5 Directory

    `$ cd /var/www/html/L5_APP`
    (Replace L5_APP accordingly)

1. Set your database credentials
    Open you .env file under L5_APP
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=DB_NAME
DB_USERNAME=DB_USERNAME
DB_PASSWORD=DB_PASSWORD
```
3. Start with the database
  - Create a [migration](https://laravel.com/docs/5.4/migrations)

    `php artisan make:migration create_anthu_table`
  - Within the up method type;
    ```php
    Schema::create('anthu', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->rememberToken();
        $table->timestamps();
    });
    ```

  - Run the migration

    `php artisan migrate`
4. Create a model

  `php artisan make:model Anthu`

  ```
  <?php

  //rememeber namespaces?
  namespace App;

  //How would you alias this?
  //In case you wanted to call it Mtungi :) ?
  use Illuminate\Database\Eloquent\Model;

  class Anthu extends Model{
      //specifies the table associated with this model
      protected $table = 'anthu';
      //the primary key field
      public $primaryKey = 'id';
      //timestamps
      //this automatically adds timestamps for create and updates (created_at & updated_at)
      public $timestamps = true;
      //what attributes can be assigned
      protected $fillable = array('name', 'email', 'password', 'created_at', 'updated_at');
      //hidden attributes
      protected $hidden = array('password');
  }
  ?>
  ```
5. Specify the routing
  - routes/web.php

  ```php
  //Login route -- the form
  Route::get('login', array('as' => 'login', 'uses' => 'AnthuController@login'));

  //Login route - the action
  Route::post('anthu/login', array('as' => 'anthu.login', 'uses' => 'AnthuController@attemptLogin'));

  //Logout route
  Route::get('logout', array('as' => 'logout', 'uses' => 'AnthuController@logout'));

  //secure route
  //Laravel will automatically check for user login when this page is accessed. If the user is not logged in the he/she is redirected to login page
  //Laravel ships with an auth middleware, which is defined at  Illuminate\Auth\Middleware\Authenticate. Since this middleware is already registered in your HTTP kernel, all you need to do is attach the middleware to a route definition:
  Route::get('anthu/profile', array('as' => 'anthu.profile', 'uses' => 'AnthuController@profile'))->middleware('auth');

  //Mockr route
  Route::get('mockr', array('as' => 'mockr', 'uses' => 'AnthuController@mockr'));
  ```
6. Create the controller

  `php artisan make:controller AnthuController`

  > adding `--resource` to the above creates basic CRUD routes in the controller class.

  create the `login`,`attemptLogin`, `profile` and `logout` methods

  We will also add a `mockr` (already in routes) method that create as a dummy users.

  - login

  ```php
public function login(){
     return view('anthu.login', array('title' => 'Login'));
}
```
  - attemptLogin

  ```php
public function attemptLogin(Request $request){
     if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {
         return redirect()->route('anthu.profile');
     } else {
         return redirect()->route('login');
     }
}
```

  - logout

  ```php
public function logout(){
  //log them out
  Auth::logout();
  //redirect to home route
  return redirect()->route('/');
}
```
  - profile

  ```php
//code...
```
  - mockr

```php
/**
 * Inserts some mock data into the anthu table
 * @return null
 */
public function mockr(){

  //empty the table.. :D
  Anthu::truncate();

  echo 'Anthu table truncated...<br/>';

  //create some users

  //OOP Approach -- uses Eloquent ORM
  $wambua = new Anthu();
  $wambua->name = 'Wambua Mumo';
  $wambua->email = "wambua@example.com";
  $wambua->password = Hash::make('123456');
  $wambua->save();

  //simple select

  echo "first user inserted : id --> {$wambua->anthu_id}....<br/>";

  $walubengo = new Anthu();
  $walubengo->name = "Walubengo Mwambingu";
  $walubengo->email = "wmwambingu@example.com";
  $walubengo->password = Hash::make('123456');
  $walubengo->save();

  echo "second user inserted : id --> {$walubengo->anthu_id}....<br/>";


  //Using laravel's query builder(Fluent)
  //insert single
  //NB: Timestamps must be added manually when using fluent
  DB::table('anthu')->insert(
    ['name' => 'Muthemba Gaturu','email' => 'mgaturu@example.com', 'password' => Hash::make('123456'),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
  );
  //insert multiple
  DB::table('anthu')->insert([
    ['name' => 'Sironka Naiswako','email' => 'sironka@example.com', 'password' => Hash::make('123456'),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
    ['name' => 'Njakini Flora','email' => 'njakini@example.com', 'password' => Hash::make('123456'),'created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")]
  ]);

  echo 'Last bunch..';
  $total = count(Anthu::all());
  echo "<br/> Total number of users {$total}";
}        
```
7.Create the views

  - Under views, Create a new folder(layouts) and file (app.blade.php)
    views/layouts/app.blade.php
  - Create  a new folder(anthu) and file(login.blade.php)
    views/anthu/login.blade.php
  - Create a new file profile.blade.php
    views/anthu/profile.blade.php
 - Modify welcome.blade.php
    Remove links, add login link


## References
- [Laravel Documentation - Installation](https://laravel.com/docs/5.5/installation)
- [DigitalOcean Tutorials](https://www.digitalocean.com/community/tutorials)
- [OWASP Top 10 -2017 The Ten Most Critical Web Application Security Risks](resources/OWASP_Top_10-2017_en.pdf)
- [Creating a Basic Laravel 5 MVC Application in 10 Minutes](https://selftaughtcoders.com/from-idea-to-launch/lesson-17/laravel-5-mvc-application-in-10-minutes/)
- [Artisan Console](https://laravel.com/docs/5.4/artisan)
- [Interesting read : Why Laravel is NOT an MVC framework and you should forget about MVC](https://www.linkedin.com/pulse/why-laravel-mvc-framework-you-should-forget-kali-dass)

>_"Above all else, guard your affections. For they influence everything else in your life."_ ✍ ✍
