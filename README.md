# Wordpress Project Starter!

A Wordpress project starter theme/process with Timber, UiKit, Sass, Gulp, Webpack & more.

Personal setup For XAMPP projects.

---

## Starting a new project with XAMPP.

1. Download [Wordpress](https://wordpress.org/download/) and unzip into htdocs folder.

2. Rename folder to your test domain, example: yourdomain.test.

3. Add new line to your hosts file to map your test domain to your localhost IP.

        127.0.0.1		yourdomain.test

4. Add new entry to bottom of XAMPP's httpd.conf file to map your project folder in htdocs to your IP mapping.

        <VirtualHost *:80>
            ServerName yourdomain.test
            DocumentRoot c:/xampp/htdocs/yourdomain.test
            ServerAlias *.yourdomain.test
        </VirtualHost>

5. Start up XAMPP & confirm you can connect to test domain in the browser by adding hello.html to root of new project folder and visting yourdomain.test/hello.html.

6. Create new database for project in XAMPP's phpmyadmin and setup wp-config.php file to connect to it.

7. Visit test domain URL in browser and do the wp setup/installation process.


## Cloning theme into your project folder & connecting it to a new project repo:

1. Create new repo on github

2. Navigate to wp-content/themes folder of your new project in htdocs within the command line

3.

        git clone https://github.com/robmccormack89/project-starter-wp.git

4. Rename folder of theme to whatever you like. You will need to rename other parts within theme using search/replace later. Steps for that are below.

5. Navigate inside theme folder

6. 

        git init

7.

        git remote rm origin

8.

        git add .

9.

        git commit -m "initial commit"

10.

        git remote add origin https://github.com/your_name/your_project.git

11.

        git push -u origin master

12. The project is now cloned and set up as a new project on your github. You can now clone from that and follow the same process!

## Renaming Theme using search/replace

1. Rename theme folder

2. Rename 'Starter' & 'starter' references in style.css

3. Rename 'Starter' references in *.php file headers

4. Rename 'Starter' & 'starter' references in: functions.php, theme-functions.php & timber-functions.php

5. Rename 'Starter' & 'starter' references in uikit-html-widget.php

6. Rename 'starter' references in tease.twig, single.twig, no-sidebar-template.twig, left-sidebar-template.twig & right-sidebar-template.twig. Example:

        {{ post.thumbnail.src('starter-theme-featured-image-archive') }}

**Note:** Always use Match Case!

---

## Using Sass with Gulp

## Using Webpack & including js libraries

## Using UiKit

## Using Timber 