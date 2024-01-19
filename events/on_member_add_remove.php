<?php

use Discord\Discord;
use Discord\WebSockets\Event;
use Discord\Parts\User\Member;

global $config;
global $discord;


$discord->on(Event::GUILD_MEMBER_ADD, function (Member $member, Discord $discord) use ($config)
{
    $guild = $discord->guilds->get('id', $config->GUILD_ID);
    $logChannel = $guild->channels->get('id', $config->GENERAL_CHANNEL_ID);
    $logChannel->sendMessage('Welcome '.$member->displayname.'!');
});


$discord->on(Event::GUILD_MEMBER_REMOVE, function (Member $member, Discord $discord) use ($config)
{
    $guild = $discord->guilds->get('id', $config->GUILD_ID);
    $logChannel = $guild->channels->get('id', $config->GENERAL_CHANNEL_ID);
    $logChannel->sendMessage('Member '.$member->displayname.' has gone away!');
});