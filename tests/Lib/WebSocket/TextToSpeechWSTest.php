<?php

declare(strict_types=1);

namespace Tests\Lib\WebSocket;

use PHPUnit\Framework\TestCase;
use Telnyx\Lib\WebSocket\StreamClientEvent;
use Telnyx\Lib\WebSocket\TextToSpeechStreamParams;
use Telnyx\Lib\WebSocket\TtsServerEvent;
use Telnyx\Lib\WebSocket\TtsStreamMessage;
use Telnyx\Lib\WebSocket\WebSocketError;

/**
 * @internal
 *
 * @coversNothing
 */
class TextToSpeechWSTest extends TestCase
{
    public function testTextToSpeechStreamParamsDefault(): void
    {
        $params = new TextToSpeechStreamParams;

        $this->assertNull($params->voice);
        $this->assertNull($params->voiceProvider);
        $this->assertNull($params->outputFormat);
        $this->assertNull($params->sampleRate);
        $this->assertNull($params->language);
        $this->assertNull($params->speakingRate);
        $this->assertNull($params->clientRef);
    }

    public function testTextToSpeechStreamParamsCustom(): void
    {
        $params = new TextToSpeechStreamParams([
            'voice' => 'Telnyx.Allison',
            'voice_provider' => 'Telnyx',
            'output_format' => 'mp3',
            'sample_rate' => 22050,
            'language' => 'en-US',
            'speaking_rate' => 1.2,
            'client_ref' => 'test-ref-456',
        ]);

        $this->assertEquals('Telnyx.Allison', $params->voice);
        $this->assertEquals('Telnyx', $params->voiceProvider);
        $this->assertEquals('mp3', $params->outputFormat);
        $this->assertEquals(22050, $params->sampleRate);
        $this->assertEquals('en-US', $params->language);
        $this->assertEquals(1.2, $params->speakingRate);
        $this->assertEquals('test-ref-456', $params->clientRef);
    }

    public function testTextToSpeechStreamParamsToQueryParams(): void
    {
        $params = new TextToSpeechStreamParams([
            'voice' => 'Telnyx.Allison',
            'output_format' => 'mp3',
        ]);

        $queryParams = $params->toQueryParams();

        $this->assertEquals('Telnyx.Allison', $queryParams['voice']);
        $this->assertEquals('mp3', $queryParams['output_format']);
        $this->assertCount(2, $queryParams);
    }

    public function testTextToSpeechStreamParamsEmptyToQueryString(): void
    {
        $params = new TextToSpeechStreamParams;
        $queryString = $params->toQueryString();

        $this->assertEquals('', $queryString);
    }

    public function testStreamClientEventText(): void
    {
        $event = StreamClientEvent::text('Hello world', true);

        $this->assertEquals('text', $event->type);
        $this->assertEquals('Hello world', $event->text);
        $this->assertTrue($event->isFinal);
    }

    public function testStreamClientEventFlush(): void
    {
        $event = StreamClientEvent::flush();

        $this->assertEquals('flush', $event->type);
        $this->assertNull($event->text);
        $this->assertNull($event->isFinal);
    }

    public function testStreamClientEventClose(): void
    {
        $event = StreamClientEvent::close();

        $this->assertEquals('close', $event->type);
        $this->assertNull($event->text);
        $this->assertNull($event->isFinal);
    }

    public function testStreamClientEventToJson(): void
    {
        $event = StreamClientEvent::text('Test text', false);
        $json = $event->toJson();
        $decoded = json_decode($json, true);

        $this->assertEquals('text', $decoded['type']);
        $this->assertEquals('Test text', $decoded['text']);
        $this->assertFalse($decoded['is_final']);
    }

    public function testStreamClientEventToArray(): void
    {
        $event = new StreamClientEvent('text', 'Hello', true, ['extra' => 'param']);
        $array = $event->toArray();

        $this->assertEquals('text', $array['type']);
        $this->assertEquals('Hello', $array['text']);
        $this->assertTrue($array['is_final']);
        $this->assertEquals('param', $array['extra']);
    }

    public function testTtsServerEventAudioChunk(): void
    {
        $audioBase64 = base64_encode('fake audio data');
        $event = new TtsServerEvent([
            'type' => 'audio_chunk',
            'audio' => $audioBase64,
            'text' => 'Hello',
            'is_final' => false,
            'cached' => true,
            'time_to_first_audio_frame_ms' => 150,
        ]);

        $this->assertEquals('audio_chunk', $event->type);
        $this->assertEquals($audioBase64, $event->audio);
        $this->assertEquals('Hello', $event->text);
        $this->assertFalse($event->isFinal);
        $this->assertTrue($event->cached);
        $this->assertEquals(150, $event->timeToFirstAudioFrameMs);
        $this->assertTrue($event->isAudioChunk());
        $this->assertFalse($event->isFinalEvent());
        $this->assertFalse($event->isError());
    }

    public function testTtsServerEventFinal(): void
    {
        $event = new TtsServerEvent([
            'type' => 'final',
            'is_final' => true,
        ]);

        $this->assertEquals('final', $event->type);
        $this->assertTrue($event->isFinal);
        $this->assertTrue($event->isFinalEvent());
        $this->assertFalse($event->isAudioChunk());
    }

    public function testTtsServerEventError(): void
    {
        $event = new TtsServerEvent([
            'type' => 'error',
            'error' => 'Synthesis failed',
        ]);

        $this->assertEquals('error', $event->type);
        $this->assertEquals('Synthesis failed', $event->error);
        $this->assertTrue($event->isError());
    }

    public function testTtsServerEventFromJson(): void
    {
        $json = '{"type":"audio_chunk","audio":"YXVkaW8=","is_final":false}';
        $event = TtsServerEvent::fromJson($json);

        $this->assertEquals('audio_chunk', $event->type);
        $this->assertEquals('YXVkaW8=', $event->audio);
        $this->assertFalse($event->isFinal);
    }

    public function testTtsServerEventGetAudioBytes(): void
    {
        $originalData = 'test audio data';
        $event = new TtsServerEvent([
            'type' => 'audio_chunk',
            'audio' => base64_encode($originalData),
        ]);

        $this->assertEquals($originalData, $event->getAudioBytes());
    }

    public function testTtsServerEventGetAudioBytesNull(): void
    {
        $event = new TtsServerEvent(['type' => 'final']);
        $this->assertNull($event->getAudioBytes());
    }

    public function testTtsStreamMessageTypes(): void
    {
        $connecting = new TtsStreamMessage('connecting');
        $this->assertTrue($connecting->isConnecting());
        $this->assertFalse($connecting->isOpen());

        $open = new TtsStreamMessage('open');
        $this->assertTrue($open->isOpen());
        $this->assertFalse($open->isConnecting());

        $closing = new TtsStreamMessage('closing');
        $this->assertTrue($closing->isClosing());

        $close = new TtsStreamMessage('close');
        $this->assertTrue($close->isClose());

        $serverEvent = new TtsServerEvent(['type' => 'audio_chunk']);
        $message = new TtsStreamMessage('message', $serverEvent);
        $this->assertTrue($message->isMessage());
        $this->assertEquals($serverEvent, $message->message);

        $error = new WebSocketError('Test error');
        $errorMessage = new TtsStreamMessage('error', null, $error);
        $this->assertTrue($errorMessage->isError());
        $this->assertEquals($error, $errorMessage->error);
    }
}
