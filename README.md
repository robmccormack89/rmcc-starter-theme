# Wordpress Project Starter

A Wordpress project starter theme/process with Timber, UiKit, Sass, Gulp, Webpack & more.

For XAMPP projects.

---

## Starting a new project with XAMPP.

1. Download [Wordpress](https://wordpress.org/download/) and unzip into htdocs folder.

2. Rename folder to your test domain, example: yourdomain.test.

3. Add new line to your hosts file to map your test domain to your localhost IP.

        127.0.0.1		yourdomain.test

4. Add new entry to bottom of XAMPP's https.conf file to map your project folder in htdocs to your IP mapping.

        <VirtualHost *:80>
            ServerName yourdomain.test
            DocumentRoot c:/xampp/htdocs/yourdomain.test
            ServerAlias *.yourdomain.test
        </VirtualHost>

5. Start up XAMPP & confirm you can connect to test domain in the browser by adding hello.html to root of new project folder and visting yourdomain.test/hello.html.

6. Create new database for project in XAMPP's phpmyadmin and setup wp-config.php file to connect to it.

7. Visit test domain URL in browser and do the wp setup/installation process. 