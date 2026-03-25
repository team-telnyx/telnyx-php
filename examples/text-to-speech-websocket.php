<?php

/**
 * Text-to-Speech WebSocket Streaming Example
 *
 * This example demonstrates how to use the Telnyx PHP SDK's WebSocket support
 * to perform real-time text-to-speech synthesis.
 *
 * Prerequisites:
 * - Set TELNYX_API_KEY environment variable
 * - Install dependencies: composer install
 *
 * Usage:
 *   php examples/text-to-speech-websocket.php "Hello, this is a test."
 *   php examples/text-to-speech-websocket.php "Hello, this is a test." output.mp3
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Telnyx\Client;
use Telnyx\Lib\WebSocket\StreamClientEvent;
use Telnyx\Lib\WebSocket\TextToSpeechStreamParams;
use Telnyx\Lib\WebSocket\TextToSpeechWS;
use Telnyx\Lib\WebSocket\TtsServerEvent;
use Telnyx\Lib\WebSocket\WebSocketError;

// Check for text argument
if ($argc < 2) {
    echo "Usage: php text-to-speech-websocket.php <text> [output-file.mp3]\n";
    exit(1);
}

$text = $argv[1];
$outputFile = $argv[2] ?? 'output.mp3';

// Create the Telnyx client
$client = new Client();

// Create stream parameters
$params = new TextToSpeechStreamParams([
    'voice' => 'Telnyx.Allison',
    'output_format' => 'mp3',
]);

echo "Connecting to Telnyx Text-to-Speech WebSocket...\n";
echo "Text: \"{$text}\"\n";
echo "Output: {$outputFile}\n\n";

// Create the WebSocket client
$ws = new TextToSpeechWS($client, $params);

// Collect audio chunks
$audioChunks = [];
$stats = [
    'chunks' => 0,
    'bytes' => 0,
    'timeToFirstAudio' => null,
];

// Set up event handlers
$ws->on('audio_chunk', function (TtsServerEvent $event) use (&$audioChunks, &$stats) {
    $audioBytes = $event->getAudioBytes();
    if ($audioBytes !== null) {
        $audioChunks[] = $audioBytes;
        $stats['chunks']++;
        $stats['bytes'] += strlen($audioBytes);

        if ($stats['timeToFirstAudio'] === null && $event->timeToFirstAudioFrameMs !== null) {
            $stats['timeToFirstAudio'] = $event->timeToFirstAudioFrameMs;
        }

        echo "."; // Progress indicator
    }
});

$ws->on('final', function (TtsServerEvent $event) {
    echo "\n[SYNTHESIS COMPLETE]\n";
});

$ws->on('error', function (WebSocketError $error) {
    echo "\nError: {$error->getMessage()}\n";
});

try {
    // Wait for connection to be established
    $ws->waitForOpen();
    echo "Connected! Sending text for synthesis...\n";

    // Send the text (mark as final)
    $ws->send(StreamClientEvent::text($text, true));

    // Poll for responses until we get the final event
    $timeout = 30; // seconds
    $startTime = time();
    $complete = false;

    while (time() - $startTime < $timeout && !$complete) {
        $event = $ws->poll(1);

        if ($event !== null) {
            if ($event->isError()) {
                break;
            }
            if ($event->isFinalEvent()) {
                $complete = true;
            }
        }
    }

    // Close the connection
    $ws->close();

    // Write audio to file
    if (!empty($audioChunks)) {
        $audioData = implode('', $audioChunks);
        file_put_contents($outputFile, $audioData);

        echo "\nSynthesis Statistics:\n";
        echo "  - Chunks received: {$stats['chunks']}\n";
        echo "  - Total bytes: {$stats['bytes']}\n";
        if ($stats['timeToFirstAudio'] !== null) {
            echo "  - Time to first audio: {$stats['timeToFirstAudio']}ms\n";
        }
        echo "\nAudio saved to: {$outputFile}\n";
    } else {
        echo "\nWarning: No audio chunks received.\n";
    }

} catch (WebSocketError $e) {
    echo "WebSocket Error: {$e->getMessage()}\n";
    exit(1);
}


/**
 * Alternative: Using the stream() generator
 *
 * This is a more elegant way to handle the WebSocket stream using PHP generators.
 */
function exampleUsingStream(): void
{
    $client = new Client();
    $params = new TextToSpeechStreamParams([
        'voice' => 'Telnyx.Allison',
        'output_format' => 'mp3',
    ]);

    $ws = new TextToSpeechWS($client, $params);

    // Wait for connection and send text
    $ws->waitForOpen();
    $ws->send(StreamClientEvent::text('Hello from the stream example!', true));

    $audioChunks = [];

    // Use the generator-based stream
    foreach ($ws->stream() as $streamMessage) {
        switch ($streamMessage->type) {
            case 'connecting':
                echo "Connecting...\n";
                break;

            case 'open':
                echo "Connected!\n";
                break;

            case 'message':
                $event = $streamMessage->message;
                if ($event !== null && $event->isAudioChunk()) {
                    $audioChunks[] = $event->getAudioBytes();
                    echo ".";
                }
                break;

            case 'error':
                echo "\nError: " . $streamMessage->error?->getMessage() . "\n";
                break;

            case 'close':
                echo "\nConnection closed.\n";
                break;
        }
    }

    // Save audio
    if (!empty($audioChunks)) {
        file_put_contents('stream-output.mp3', implode('', $audioChunks));
        echo "Audio saved to stream-output.mp3\n";
    }
}

// Uncomment to run the stream example:
// exampleUsingStream();
