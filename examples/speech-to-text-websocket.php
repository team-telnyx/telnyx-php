<?php

/**
 * Speech-to-Text WebSocket Streaming Example
 *
 * This example demonstrates how to use the Telnyx PHP SDK's WebSocket support
 * to perform real-time speech-to-text transcription.
 *
 * Prerequisites:
 * - Set TELNYX_API_KEY environment variable
 * - Install dependencies: composer install
 * - Have audio data ready (WAV format recommended)
 *
 * Usage:
 *   php examples/speech-to-text-websocket.php path/to/audio.wav
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Telnyx\Client;
use Telnyx\Lib\WebSocket\SpeechToTextStreamParams;
use Telnyx\Lib\WebSocket\SpeechToTextWS;
use Telnyx\Lib\WebSocket\SttServerEvent;
use Telnyx\Lib\WebSocket\WebSocketError;

// Check for audio file argument
if ($argc < 2) {
    echo "Usage: php speech-to-text-websocket.php <audio-file.wav>\n";
    exit(1);
}

$audioFile = $argv[1];

if (!file_exists($audioFile)) {
    echo "Error: Audio file not found: {$audioFile}\n";
    exit(1);
}

// Create the Telnyx client
$client = new Client();

// Create stream parameters
$params = new SpeechToTextStreamParams([
    'transcription_engine' => 'Deepgram',
    'input_format' => 'wav',
    'language' => 'en-US',
    'interim_results' => true,
]);

echo "Connecting to Telnyx Speech-to-Text WebSocket...\n";
echo "URL: wss://api.telnyx.com/v2/speech-to-text/transcription?{$params->toQueryString()}\n\n";

// Create the WebSocket client
$ws = new SpeechToTextWS($client, $params);

// Set up event handlers
$ws->on('transcript', function (SttServerEvent $event) {
    $finalLabel = $event->isFinal ? '[FINAL]' : '[INTERIM]';
    $confidence = $event->confidence !== null ? sprintf(' (%.0f%%)', $event->confidence * 100) : '';
    echo "{$finalLabel} {$event->transcript}{$confidence}\n";
});

$ws->on('error', function (WebSocketError $error) {
    echo "Error: {$error->getMessage()}\n";
});

try {
    // Wait for connection to be established
    $ws->waitForOpen();
    echo "Connected! Sending audio data...\n\n";

    // Read and send audio data in chunks
    $audioData = file_get_contents($audioFile);
    $chunkSize = 8192; // 8KB chunks
    $chunks = str_split($audioData, $chunkSize);

    foreach ($chunks as $i => $chunk) {
        $ws->send($chunk);
        echo "."; // Progress indicator

        // Small delay to simulate real-time streaming
        usleep(50000); // 50ms
    }

    echo "\n\nAudio sent. Waiting for final transcription...\n";

    // Poll for responses
    $timeout = 10; // seconds
    $startTime = time();

    while (time() - $startTime < $timeout) {
        $event = $ws->poll(1);

        if ($event !== null && $event->isError()) {
            break;
        }

        // Check if we got a final transcript
        if ($event !== null && $event->isFinal === true) {
            echo "\nTranscription complete!\n";
            break;
        }
    }

    // Close the connection
    $ws->close();
    echo "\nConnection closed.\n";

} catch (WebSocketError $e) {
    echo "WebSocket Error: {$e->getMessage()}\n";
    exit(1);
}
