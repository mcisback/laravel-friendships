<?php

namespace Hootlex\Friendships;

use Illuminate\Support\ServiceProvider;

class FriendshipsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        if (class_exists('CreateFriendshipsTable') || class_exists('CreateFriendshipsGroupsTable')) {
            return;
        }

        $stub      = __DIR__ . '/database/migrations/';
        $target    = database_path('migrations') . '/';

        $this->publishes([
            $stub . 'create_friendships_table.php'        => $target . date('Y_m_d_His', time()) . '_create_friendships_table.php',
            $stub . 'create_friendships_groups_table.php' => $target . date('Y_m_d_His', time() + 1) . '_create_friendships_groups_table.php'
        ], 'laravel-friendship:migrations');

        $this->publishes([
            __DIR__ . '/config/friendships.php' => config_path('friendships.php'),
        ], 'laravel-friendship:config');

        $this->publishes([
            __DIR__ . "/Events/FriendshipAccepted.php"  => base_path() . "/app/Events/FriendshipAccepted.php",
            __DIR__ . "/Events/FriendshipBlocked.php"   => base_path() . "/app/Events/FriendshipBlocked.php",
            __DIR__ . "/Events/FriendshipCancelled.php" => base_path() . "/app/Events/FriendshipCancelled.php",
            __DIR__ . "/Events/FriendshipDenied.php"    => base_path() . "/app/Events/FriendshipDenied.php",
            __DIR__ . "/Events/FriendshipSent.php"      => base_path() . "/app/Events/FriendshipSent.php",
            __DIR__ . "/Events/FriendshipUnblocked.php" => base_path() . "/app/Events/FriendshipUnblocked.php",
        ], 'laravel-friendship:events');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
