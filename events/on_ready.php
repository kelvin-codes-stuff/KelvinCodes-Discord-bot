<?php

use Discord\Discord;

include __dir__.'/helpers/logging.php';

global $discord;


$discord->on('ready', function (Discord $discord)
{
    echo 'The bot has been started!';
    ServerLogging::greenEmbed($title = 'Reboot', $desc = 'The bot has been rebooted!');
});