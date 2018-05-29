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
  2. [Install Ubuntu on VMware Worstation Player](https://websiteforstudents.com/how-to-install-ubuntu-16-04-17-10-18-04-on-vmware-workstation-guest-machines/)
2. [Dual Boot](https://www.youtube.com/watch?v=qNeJvujdB-0)
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

### Stonecold Login 😜 😜 🤡 🤡


## References
- [Laravel Documentation - Installation](https://laravel.com/docs/5.5/installation)
- [DigitalOcean Tutorials](https://www.digitalocean.com/community/tutorials)
- [OWASP Top 10 -2017 The Ten Most Critical Web Application Security Risks](resources/OWASP_Top_10-2017_en.pdf)

>_"Above all else, guard your affections. For they influence everything else in your life."_ ✍ ✍
