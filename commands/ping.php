<?php

use Discord\Discord;
use Discord\Parts\Channel\Message;
use Discord\Builders\CommandBuilder;
use Discord\Builders\MessageBuilder;
use Discord\Parts\Interactions\Interaction;

global $discord;


$discord->on('ready', function (Discord $discord) {
    $discord->application->commands->save(
        $discord->application->commands->create(CommandBuilder::new()
            ->setName('ping')
            ->setDescription('Check if the bot is up!')
            ->toArray()
        )
    );
});


$discord->listenCommand('ping', function (Interaction $interaction) {
    $interaction->respondWithMessage(MessageBuilder::new()->setContent('Pong!'));
});