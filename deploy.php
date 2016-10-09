<?php

require 'recipe/common.php';

set('repository', 'git@github.com:user/project.git');
set('shared_files', []);
set('shared_dirs', [
    'website/var/areas',
    'website/var/assets',
    'website/var/backup',
    'website/var/cache',
    'website/var/classes',
    'website/var/config',
    'website/var/email',
    'website/var/log',
    'website/var/plugins',
    'website/var/recyclebin',
    'website/var/search',
    'website/var/system',
    'website/var/tmp',
    'website/var/versions',
    'website/var/webdav',
]);
// "pimcore" directory is set as writable because the installation process requires it
set('writable_dirs', ['website/var', 'pimcore']);

serverList('servers.yml');

task('pimcore-sak:migrate', function () {
    // Run task only if Pimcore is installed
    $configFileExist = run('if [ -f {{release_path}}/website/var/config/system.php ]; then echo true; fi')->toBool();
    if ($configFileExist) {
        run('cd {{release_path}}; php extra/shell/MigrateCheckout.php');
    }
})->desc('Pimcore-SAK class migration');

// Comment following line out if you don't want to use pimcore-sak
after('success', 'pimcore-sak:migrate');

task('deploy', [
    'deploy:prepare',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:writable',
    'deploy:vendors',
    'deploy:symlink',
    'cleanup',
])->desc('Deploy your project');

after('deploy', 'success');
