# Pimcore-Deployer

Basic Deployer configuration for Pimcore which can be used for deployment process.

## Installation

0. Add deployer to your project by composer 
```
composer require deployer/deployer:^3.2
```
This step is optional because Deployer can be installed globally.
1. Copy `deploy.php` and `servers.yml.dist` to your project repository. You can also use my `.gitignore`.
2. (Optional) Add [pimcore-sak](https://github.com/DivanteLtd/pimcore-sak) to the repository as it allows migrating Pimcore classes
automatically (just remember to use `php extra/shell/MigrateCommit.php` to export them to JSON).
3. Create `servers.yml` file. Use `servers.yml.dist` as an example.
4. Set you project repository addres in `deploy.php`. Feel free to add your own scripts - [Deployer Docs](http://deployer.org/docs/getting-started).
5. (Deployment) Go to your project directory in terminal and run `php vendor/bin/dep deploy prod`

