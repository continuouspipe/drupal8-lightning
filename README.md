This is a Composer-based installer for the [Lightning Drupal distribution](https://github.com/acquia/lightning-project). Because we are living the future, there is also the [Docker](Dockerfile) and [ContinuousPipe](https://continuouspipe.io) configurations.

We are running this in Docker too!

## Get Started

* [Dock-Cli](https://github.com/inviqa/dock-cli)
* [Docker-Machine-NFS](https://github.com/adlogix/docker-machine-nfs)

You will also need a [Github OAuth](https://github.com/settings/tokens) token to hand. If you've set one up before, check `~/.composer/auth.json`.

When you have those, run this command:
```bash
# If you don't have docker yet!
dock-cli docker:install
# Speedy mountpoints for sharing your code.
docker-machine-nfs dinghy

# Run the development installer
DRUPAL_CONFIG_DIRECTORY_SECRET="<LongRandomString>" DRUPAL_HASH_SALT="<LongRandomString>" GITHUB_TOKEN="<your github token>" docker-compose run --rm web /bin/bash /usr/local/share/drupal8/development/install.sh

# Or run the production installer
DRUPAL_CONFIG_DIRECTORY_SECRET="<LongRandomString>" DRUPAL_HASH_SALT="<LongRandomString>" GITHUB_TOKEN="<your github token>" docker-compose run --rm web /bin/bash /usr/local/share/drupal8/install.sh

# Start up the project
dock-cli start
```

You can access your site by checking what the DNS address is listed as in `dock-cli ps`.

## Maintenance
```drush make```, ```drush pm-download```, ```drush pm-update``` and their ilk are the old-school way of maintaining your code base. Forget them. You're in Composer land now!

Let this handy table be your guide:

| Task                                            | Drush                                         | Composer                                          |
|-------------------------------------------------|-----------------------------------------------|---------------------------------------------------|
| Installing a contrib project (latest version)   | ```drush pm-download PROJECT```               | ```composer require drupal/PROJECT:8.*```         |
| Installing a contrib project (specific version) | ```drush pm-download PROJECT-8.x-1.0-beta3``` | ```composer require drupal/PROJECT:8.1.0-beta3``` |
| Updating all contrib projects and Drupal core   | ```drush pm-update```                         | ```composer update```                             |
| Updating a single contrib project               | ```drush pm-update PROJECT```                 | ```composer update drupal/PROJECT```              |
| Updating Drupal core                            | ```drush pm-update drupal```                  | ```composer update drupal/core```                 |

Not too tricky, eh?

The magic is that Composer, unlike Drush, is a *dependency manager*. If module ```foo-8.x-1.0``` depends on ```baz-8.x-3.2```, Composer will not let you update baz to ```8.x-3.3``` (or downgrade it to ```8.x-3.1```, for that matter). Drush has no concept of dependency management. If you've ever accidentally hosed a site because of dependency issues like this, you've probably already realized how valuable Composer can be.

But to be clear: **you still need Drush**. Tasks such as database updates (```drush updatedb```) are still firmly in Drush's province, and it's awesome at that stuff. This installer will install a copy of Drush (local to the project) in the ```bin``` directory.

**Composer is only responsible for maintaining the code base**.

## Source Control
If you peek at the ```.gitignore``` we provide, you'll see that certain directories, including all directories containing contributed projects, are excluded from source control. This might be a bit disconcerting if you're newly arrived from Planet Drush, but in a Composer-based project like this one, **you SHOULD NOT commit your installed dependencies to source control**.

When you set up the project, Composer will create a file called ```composer.lock```, which is a list of which dependencies were installed, and in which versions. **Commit ```composer.lock``` to source control!** Then, when your colleagues want to spin up their own copies of the project, all they'll have to do is run ```composer install```, which will install the correct versions of everything in ```composer.lock```.
