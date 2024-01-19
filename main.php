<?php

use Discord\Discord;
use Discord\WebSockets\Intents;

include __dir__.'/vendor/autoload.php';


if (file_exists('config.php')) {
    $config = include('config.php');
} else {
    exit('No config file found! Place copy config.example.php to config.php');
}


$discord = new Discord([
    'token' => $config->TOKEN,
    'intents' => Intents::getDefaultIntents() | Intents::GUILD_MEMBERS | Intents::GUILD_MESSAGES | Intents::DIRECT_MESSAGES,
    'loadAllMembers' => true,
    'loop' => \React\EventLoop\Factory::create(),
    'dnsConfig' => '8.8.8.8',
]);


// Loading all events
foreach (glob('events/*.php') as $file)
{
    include $file;
}


// Loading all helpers
foreach (glob('helpers/*.php') as $file) 
{
    include $file;
}


// Loading all commands
foreach (glob('commands/*.php') as $file)
{
    include $file;
}


$discord->run();
