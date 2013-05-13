FC Vlcovice-Mnisi Table
=======================

Installing
----------

To install dependencies get latest version of composer and run

1. Install Composer: (see http://getcomposer.org/download)

		curl -s http://getcomposer.org/installer | php

2. Install dependencies:

		composer install

Make directories `temp` and `log` writable. Navigate your browser
to the `www` directory and you will see a welcome page. PHP 5.4 allows
you run `php -S localhost:8888 -t www` to start the webserver and
then visit `http://localhost:8888` in your browser.


It is CRITICAL that file `app/config/config.neon` & whole `app`, `log`
and `temp` directory are NOT accessible directly via a web browser! If you
don't protect this directory from direct web access, anybody will be able to see
your sensitive data. See [security warning](http://nette.org/security-warning).
