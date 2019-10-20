Need npm or yarn & composer installed globally to install the packages.

Main dependency for project is uikit.

Dev dependencies include: webpack & cli, node sass, gulp sass, autoprefixer, browsersync, expose loader, etc. Check the package.json.

Composer is used to for symfony & twig. Twig is our templating language. This is intended as a php-based project. Twig can optionally be used withs a js-only version.

This repository is intended mainly as a starting point for personal frontend projects. There will be a corresponding wp version for wp projects.

Steps for github:

Create new project on Github.

Create new project folder in htdocs.

Step to your project directory (htdocs) and git clone https://github.com/robmccormack89/project-starter.git

git init

git add .

git commit -m "initial commit"

git remote add origin "github.com/your_repo.git"

git push -u origin master

steps for composer:

composer install

steps for yarn / npm:

yarn install or npm install

steps for sass:

gulp style

steps for js:

npx webpack