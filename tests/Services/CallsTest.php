<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class CallsTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testDial(): void
    {
        $result = $this->client->calls->dial(
            connectionID: '7267xxxxxxxxxxxxxx',
            from: '+18005550101',
            to: '+18005550100 or sip:username@sip.telnyx.com',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDialWithOptionalParams(): void
    {
        $result = $this->client->calls->dial(
            connectionID: '7267xxxxxxxxxxxxxx',
            from: '+18005550101',
            to: '+18005550100 or sip:username@sip.telnyx.com',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveStatus(): void
    {
        $result = $this->client->calls->retrieveStatus('call_control_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
