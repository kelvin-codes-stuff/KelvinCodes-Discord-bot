<?php

use Discord\Discord;
use Discord\Parts\Channel\Message;

global $discord;


$discord->on('message', function (Message $message, Discord $discord) 
{
    if ($message->author->bot) {
        return;
    }

    if (strtolower($message->content) == 'ping') {
        $message->reply('Pong!');
    }
});