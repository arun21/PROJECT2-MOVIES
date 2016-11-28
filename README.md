# WordPress Heroku

This project is a template for installing and running [WordPress](http://wordpress.org/) on [Heroku](http://www.heroku.com/). The repository comes bundled with:
* [PostgreSQL for WordPress](http://wordpress.org/extend/plugins/postgresql-for-wordpress/)
* [Cloudinary for non ephemeral Image and Video Storage](http://cloudinary.com/)
* [WP Sendgrid](https://wordpress.org/plugins/wp-sendgrid/)
* [Disqus Commenting System](https://disqus.com/)
* [Wordpress HTTPS](https://wordpress.org/plugins/wordpress-https/)

## Installation

1. Fork [the repository](https://github.com/rhildred/wordpress-heroku) to your own github
1. Create a new php app on on [Heroku](http://www.heroku.com/).
1. Add a heroku postgres database to your app
1. Deploy to Heroku from github
1. After deployment WordPress has a few more steps to setup the installation by visiting your app and thats it!

## Usage

Because a file cannot be written to Heroku's file system, updating and installing plugins or themes should be done locally and then pushed to Heroku.

Multimedia can also not be stored there for the same reasons. You will need to activate the cloudinary plugin and get your multimedia from cloudinary.

## Updating

Updating your WordPress version is just a matter of merging the updates into
the branch created from the installation.

    $ git pull # Get the latest

Using the same branch name from our installation:

    $ git checkout production
    $ git merge master # Merge latest
    $ git push heroku production:master

WordPress needs to update the database. After push, navigate to:

    http://your-app-url.herokuapp.com/wp-admin

WordPress will prompt for updating the database. After that you'll be good
to go.

## Deployment optimisation

If you have files that you want tracked in your repo, but do not need deploying (for example, *.md, *.pdf, *.zip). Then add path or linux file match to the `.slugignore` file & these will not be deployed.

Examples:
```
path/to/ignore/
bin/
*.md
*.pdf
*.zip
```

## Wiki

* [Custom Domains](https://github.com/mhoofman/wordpress-heroku/wiki/Custom-Domains)
* [Media Uploads](https://github.com/mhoofman/wordpress-heroku/wiki/Media-Uploads)
* [Postgres Database Syncing](https://github.com/mhoofman/wordpress-heroku/wiki/Postgres-Database-Syncing)
* [Setting Up a Local Environment on Linux (Apache)](https://github.com/mhoofman/wordpress-heroku/wiki/Setting-Up-a-Local-Environment-on-Linux-\(Apache\))
* [Setting Up a Local Environment on Mac OS X](https://github.com/mhoofman/wordpress-heroku/wiki/Setting-Up-a-Local-Environment-on-Mac-OS-X)
* [More...](https://github.com/mhoofman/wordpress-heroku/wiki)

# PROJECT2-MOVIES
WordPress Project 2 on Movies, TV Shows. Members : Arun, Varun
