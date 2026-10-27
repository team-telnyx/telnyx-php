<?php

namespace Tests\Services\BrowserSessions;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\BrowserSessions\Actions\ActionGetResponse;
use Telnyx\BrowserSessions\Actions\ActionNewResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browserSessions->actions->create(
            'id',
            url: 'https://example.com',
            observationID: 'x',
            ref: 'x',
            value: 'value',
            key: 'Enter',
            condition: ['kind' => 'url_pattern', 'pattern' => 'x'],
            actions: [['type' => 'navigate', 'url' => 'https://example.com']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browserSessions->actions->create(
            'id',
            type: 'batch',
            url: 'https://example.com',
            waitSeconds: 0,
            idempotencyKey: 'x',
            includeObservation: true,
            waitUntil: 'load',
            observationID: 'x',
            ref: 'x',
            timeoutMs: 100,
            wait: 'no_wait',
            value: 'value',
            key: 'Enter',
            deltaX: -5000,
            deltaY: -5000,
            condition: ['kind' => 'url_pattern', 'pattern' => 'x'],
            actions: [
                [
                    'type' => 'navigate',
                    'url' => 'https://example.com',
                    'idempotencyKey' => 'x',
                    'includeObservation' => true,
                    'waitUntil' => 'load',
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browserSessions->actions->retrieve(
            'actionId',
            id: 'id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->browserSessions->actions->retrieve(
            'actionId',
            id: 'id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ActionGetResponse::class, $result);
    }
}
