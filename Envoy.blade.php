@servers(['web' => 'root@47.99.47.169'])

@task('deploy', ['on' => ['web'], 'confirm' => true])
    cd /var/www/laravel-blog-code
    git pull
@endtask
