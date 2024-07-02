<?php

namespace CB;

class CliCommand
{

    /**
     * Register the command.
     *
     * @return void
     */
    public static function register()
    {
        \WP_CLI::add_command('cb set-creds', 'CB\\Cli\\SetCreds');
        \WP_CLI::add_command('cb parse-news', 'CB\\Cli\\ParseNews');
        \WP_CLI::add_command('cb create-homepage', 'CB\\Cli\\CreateHomepage');
    }

}