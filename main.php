<?php

require_once 'vendor/autoload.php';

use Telegram\Bot\Api;

$telegram = new Api('5837889423:AAEHNJr6D3Zd2mMf4yapKhPQXPmKA9G2GAA');

$motivational_messages = [
    "La vida es 10% de lo que nos sucede y 90% de cómo reaccionamos a ello.",
    "No te rindas, el éxito está justo al alcance de tus manos.",
    "Cada fracaso es una oportunidad para empezar de nuevo con más experiencia.",
    "El éxito no es la clave de la felicidad. La felicidad es la clave del éxito.",
    "La mejor manera de predecir tu futuro es crearlo."
];

$updates = $telegram->getWebhookUpdates();

$text = $updates->getMessage()->getText();

if (strpos($text, 'estoy triste') !== false) {
    $motivational_message = array_rand($motivational_messages, 1);
    $telegram->sendMessage([
        'chat_id' => $updates->getMessage()->getChat()->getId(),
        'text' => $motivational_message
    ]);
}
