# Pimcore-Deployer

Basic Deployer configuration for Pimcore which can be used for deployment process.

## Installation

1. (Optional) Add deployer to your project by composer 

        composer require deployer/deployer:^3.2
This step is optional because Deployer can be installed globally.

2. Copy `deploy.php` and `servers.yml.dist` to your project repository. You can also use my `.gitignore`.
3. (Optional) Add [pimcore-sak](https://github.com/DivanteLtd/pimcore-sak) to the repository as it allows migrating Pimcore classes
automatically (just remember to use `php extra/shell/MigrateCommit.php` to export them to JSON).
4. Create `servers.yml` file - servers configuration. You can base on `servers.yml.dist`.
5. Set you project repository address in `deploy.php`. Optionally add your own scripts - [Deployer Docs](http://deployer.org/docs/getting-started).
6. (Deployment) Go to your project directory in terminal and run `php vendor/bin/dep deploy prod`

