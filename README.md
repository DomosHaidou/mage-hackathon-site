Mage-Hackathon site
===================

How to install?
===============
Update and install all the deps
-------------------------------

```shell
./bin/vendors update
or
./bin/vendors install --reinstall
```

Init and compile twitter-bootstrap from source
----------------------------------------------
Replace VERSION by the supported version you want, v1 or v2

```shell
php5 app/console twitter-bootstrap:clear
php5 app/console twitter-bootstrap:compile VERSION
php5 app/console assets:install web/
```

Install Symfony2 PayPal IPN Bundle
----------------------------------
https://github.com/orderly/symfony2-paypal-ipn#installation

More
====

What is it for?
---------------
Damian Luszczymak began organizing Magentho Hackathons in the beginning of 2012, 
thanks for that! The first one took place in Munich and the registration was 
realised with some social-network-media-foo and was really slow on performance.

I (Fabian Blechschmidt) want to play around wth Symfony2 and the Paypal-API,
so I do something useful and write a small site to get informations and to
register for more upcoming hackathons.

TODO
----
My idea is: show maximal the next three hacker-meetings on the first page under
the welcome-stuff, with links to detail pages and informations.

The possibility for registration and a forward to paypal to pay immediately.

Later
-----
After the basics, we can add:
* a google map to show the next hackathons
* a backend to show the participants and not to go into the database
* maybe a list with the attendees on the detail page and the option to opt-in for it
* a formular to add a new hackathon and not to write it to the database

More ideas?
-----------
Open an issue!