Upute za instaliranje:
1. Postaviti virtual host sa domenom tweetproxy.dev (ja koristim XAMPP)
a) unutar apache/conf/extra/httpd-vhosts.conf podesiti VirtualHost:

<VirtualHost *:80><br>
 ServerAdmin webmaster@wm<br>
 DocumentRoot "E:/xampp/htdocs/symfony/web"<br>
 ServerName tweetproxy.dev<br>
 ErrorLog "logs/htdocs-error.log"<br>
 CustomLog "logs/htdocs-access.log" common<br>
 <Directory "E:/xampp/htdocs/symfony/web/"><br>
  Options Indexes FollowSymLinks Includes ExecCGI<br>
  AllowOverride All<br>
  Require all granted<br>
 </Directory REMOVE_THIS><br>
</VirtualHost REMOVE_THIS><br>



b) Editirati "hosts" file kako bi mogao resolvati domenu. "hosts" file se nalazi na putanji C:\Windows\System32\drivers\etc
Unutar filea dodati liniju na kraj filea i sačuvati ga:
127.0.0.1 tweetproxy.dev

2) Importajte bazu koja je priložena u mailu 

3) Klonirati repozitorij pomoću gita (https://github.com/trbsi/tweetproxy)

4) Unutar foldera app/config dodati file parameters.yml (kopirati podatke iz parameters.yml.dist te podesiti svojim podacima)

5) Kada se repozitorij pull-a unutar folder pomoću terminala pokrenuti komandu "composer install".

6) Kada composer instalira sve što treba otvoriti sajt na adresi http://tweetproxy.dev
.
7) Dodati nekog usera u bazu i kliknuti na "Cron" link u headeru kako bi se popunila tablica sa tweetovima.


 Na sajtu se nalazi 2 linka u top headeru: "All users" i "Cron". Cron link bi se inače trebao pokretati pomoću cronjob-a kako bi se periodički uhvatili novi tweetovi svakog korisnika i dodali u bazu da proces bude brži, no ja sam dodao link kako bi se moglo pristupiti i odraditi ručno.

Tehnologije koje ste naveli da se trebaju koristiti sam koristio, uključujući i fulltext search. Ukoliko imate pitanja ili ukoliko treba nešto ispraviti ili dodati molim vas recite. Za izradu zadatka trebalo mi je 2 i pol dana.


Symfony Standard Edition
========================

Welcome to the Symfony Standard Edition - a fully-functional Symfony
application that you can use as the skeleton for your new applications.

For details on how to download and get started with Symfony, see the
[Installation][1] chapter of the Symfony Documentation.

What's inside?
--------------

The Symfony Standard Edition is configured with the following defaults:

  * An AppBundle you can use to start coding;

  * Twig as the only configured template engine;

  * Doctrine ORM/DBAL;

  * Swiftmailer;

  * Annotations enabled for everything.

It comes pre-configured with the following bundles:

  * **FrameworkBundle** - The core Symfony framework bundle

  * [**SensioFrameworkExtraBundle**][6] - Adds several enhancements, including
    template and routing annotation capability

  * [**DoctrineBundle**][7] - Adds support for the Doctrine ORM

  * [**TwigBundle**][8] - Adds support for the Twig templating engine

  * [**SecurityBundle**][9] - Adds security by integrating Symfony's security
    component

  * [**SwiftmailerBundle**][10] - Adds support for Swiftmailer, a library for
    sending emails

  * [**MonologBundle**][11] - Adds support for Monolog, a logging library

  * **WebProfilerBundle** (in dev/test env) - Adds profiling functionality and
    the web debug toolbar

  * **SensioDistributionBundle** (in dev/test env) - Adds functionality for
    configuring and working with Symfony distributions

  * [**SensioGeneratorBundle**][13] (in dev/test env) - Adds code generation
    capabilities

  * **DebugBundle** (in dev/test env) - Adds Debug and VarDumper component
    integration

All libraries and bundles included in the Symfony Standard Edition are
released under the MIT or BSD license.

Enjoy!

[1]:  https://symfony.com/doc/3.2/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.2/doctrine.html
[8]:  https://symfony.com/doc/3.2/templating.html
[9]:  https://symfony.com/doc/3.2/security.html
[10]: https://symfony.com/doc/3.2/email.html
[11]: https://symfony.com/doc/3.2/logging.html
[12]: https://symfony.com/doc/3.2/assetic/asset_management.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
