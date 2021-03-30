# RMcC Starter Theme

A Wordpress starter theme built with timber, uikit, node, gulp, webpack, sass, infinite-scroll & more.

---

## Clone theme into your project folder & connect it to a new project repo

1. Create new repo for your project on github & take note of the project url.

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

## Setup & configuation

1. Install npm packages

        npm install

2. website build scripts

        npx webpack

3. Gulp build sass (assets/sass -> assets/css)

        gulp style

4. Gulp build pot language file for translating (twig & php files -> languages)

        gulp pot

 
## Other