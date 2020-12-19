# RMcC Starter Theme

A Wordpress starter theme built with timber, uikit, node, gulp, webpack, sass, infinite-scroll & more.

---

## Start a new project with XAMPP

1. Download [Wordpress](https://wordpress.org/download/) and unzip into htdocs folder.

2. Rename wordpress folder to your development domain, example: yourdomain.test.

3. Add new line to your hosts file to map your test domain to your localhost ip.

        127.0.0.1		yourdomain.test

4. Add new entry to bottom of XAMPP's httpd.conf file to map the root of your project with the domain as an alias.

        <VirtualHost *:80>
            ServerName yourdomain.test
            DocumentRoot c:/xampp/htdocs/yourdomain.test
            ServerAlias *.yourdomain.test
        </VirtualHost>

5. Open XAMPP & connect to test domain in the browser by adding hello.html to root of new project folder and visting yourdomain.test/hello.html.

6. Create new db for project in phpmyadmin & configure wp-config.php file to connect.

7. Visit test domain in browser again & complete the wordpress setup/installation process.


## Clone theme into your project folder & connect it to a new project repo

1. Create new repo for your project on githubl take note of the project url.

2. Navigate to wp-content/themes folder of your project in the command line.

3. Use the following command to clone the starter project:

        git clone https://github.com/robmccormack89/rmcc-starter-theme

4. Rename folder of theme to whatever you like.

5. Navigate inside theme folder in the command line, remembering if you have renamed theme theme folder name.

6. Use the following commands to initialize git in the cloned theme, set the origin of it to your github repo & push to your repo as the master branch. Don't forget to replace the url below with your project's github url.

        git init
        git remote rm origin
        git add .
        git commit -m "initial commit"
        git remote add origin https://github.com/your_name/your_project.git
        git push -u origin master

7. The project is now cloned & set up as a new project on your github.

## Rename theme using search/replace

---

## Setup & configuation

---