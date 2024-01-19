<?php


class ServerLogging
{
    static function greenEmbed($title, $desc)
    {   
        global $discord;

        $guild = $discord->guilds->get('id', '1002208148930691172');
        $logChannel = $guild->channels->get('id', '1187054870168084580');
        $logChannel->sendMessage('', false, ['title' => $title, 'description' => $desc]); // Fix color
    }
}