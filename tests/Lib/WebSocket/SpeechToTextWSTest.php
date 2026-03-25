<?php

declare(strict_types=1);

namespace Tests\Lib\WebSocket;

use PHPUnit\Framework\TestCase;
use Telnyx\Lib\WebSocket\SpeechToTextStreamParams;
use Telnyx\Lib\WebSocket\SttServerEvent;
use Telnyx\Lib\WebSocket\WebSocketError;

/**
 * @internal
 *
 * @coversNothing
 */
class SpeechToTextWSTest extends TestCase
{
    public function testSpeechToTextStreamParamsDefault(): void
    {
        $params = new SpeechToTextStreamParams;

        $this->assertEquals('Deepgram', $params->transcriptionEngine);
        $this->assertEquals('wav', $params->inputFormat);
        $this->assertEquals('en-US', $params->language);
        $this->assertNull($params->sampleRate);
        $this->assertNull($params->interimResults);
        $this->assertNull($params->clientRef);
    }

    public function testSpeechToTextStreamParamsCustom(): void
    {
        $params = new SpeechToTextStreamParams([
            'transcription_engine' => 'Telnyx',
            'input_format' => 'mp3',
            'language' => 'es-ES',
            'sample_rate' => 16000,
            'interim_results' => true,
            'client_ref' => 'test-ref-123',
        ]);

        $this->assertEquals('Telnyx', $params->transcriptionEngine);
        $this->assertEquals('mp3', $params->inputFormat);
        $this->assertEquals('es-ES', $params->language);
        $this->assertEquals(16000, $params->sampleRate);
        $this->assertTrue($params->interimResults);
        $this->assertEquals('test-ref-123', $params->clientRef);
    }

    public function testSpeechToTextStreamParamsToQueryParams(): void
    {
        $params = new SpeechToTextStreamParams([
            'transcription_engine' => 'Deepgram',
            'input_format' => 'wav',
            'language' => 'en-US',
            'sample_rate' => 8000,
            'interim_results' => false,
        ]);

        $queryParams = $params->toQueryParams();

        $this->assertEquals('Deepgram', $queryParams['transcription_engine']);
        $this->assertEquals('wav', $queryParams['input_format']);
        $this->assertEquals('en-US', $queryParams['language']);
        $this->assertEquals('8000', $queryParams['sample_rate']);
        $this->assertEquals('false', $queryParams['interim_results']);
    }

    public function testSpeechToTextStreamParamsToQueryString(): void
    {
        $params = new SpeechToTextStreamParams([
            'transcription_engine' => 'Deepgram',
            'input_format' => 'wav',
            'language' => 'en-US',
        ]);

        $queryString = $params->toQueryString();

        $this->assertStringContainsString('transcription_engine=Deepgram', $queryString);
        $this->assertStringContainsString('input_format=wav', $queryString);
        $this->assertStringContainsString('language=en-US', $queryString);
    }

    public function testSttServerEventTranscript(): void
    {
        $event = new SttServerEvent([
            'type' => 'transcript',
            'transcript' => 'Hello world',
            'is_final' => true,
            'confidence' => 0.95,
        ]);

        $this->assertEquals('transcript', $event->type);
        $this->assertEquals('Hello world', $event->transcript);
        $this->assertTrue($event->isFinal);
        $this->assertEquals(0.95, $event->confidence);
        $this->assertNull($event->error);
        $this->assertTrue($event->isTranscript());
        $this->assertFalse($event->isError());
    }

    public function testSttServerEventError(): void
    {
        $event = new SttServerEvent([
            'type' => 'error',
            'error' => 'Connection failed',
        ]);

        $this->assertEquals('error', $event->type);
        $this->assertEquals('Connection failed', $event->error);
        $this->assertNull($event->transcript);
        $this->assertTrue($event->isError());
        $this->assertFalse($event->isTranscript());
    }

    public function testSttServerEventFromJson(): void
    {
        $json = '{"type":"transcript","transcript":"Test transcript","is_final":false,"confidence":0.85}';
        $event = SttServerEvent::fromJson($json);

        $this->assertEquals('transcript', $event->type);
        $this->assertEquals('Test transcript', $event->transcript);
        $this->assertFalse($event->isFinal);
        $this->assertEquals(0.85, $event->confidence);
    }

    public function testSttServerEventFromJsonInvalid(): void
    {
        $this->expectException(\JsonException::class);
        SttServerEvent::fromJson('invalid json');
    }

    public function testWebSocketError(): void
    {
        $cause = new \Exception('Original error');
        $errorData = ['code' => 'ERR_001', 'message' => 'Test error'];

        $error = new WebSocketError('Test error message', $errorData, $cause);

        $this->assertEquals('Test error message', $error->getMessage());
        $this->assertEquals($errorData, $error->errorData);
        $this->assertEquals($cause, $error->cause);
    }
}
