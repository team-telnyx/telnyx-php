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
final class SiprecConnectorsTest extends TestCase
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
    public function testCreate(): void
    {
        $result = $this->client->siprecConnectors->create(
            host: 'siprec.telnyx.com',
            name: 'my-siprec-connector',
            port: 5060
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->siprecConnectors->create(
            host: 'siprec.telnyx.com',
            name: 'my-siprec-connector',
            port: 5060
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->siprecConnectors->retrieve('connector_name');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->siprecConnectors->update(
            'connector_name',
            host: 'siprec.telnyx.com',
            name: 'my-siprec-connector',
            port: 5060,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->siprecConnectors->update(
            'connector_name',
            host: 'siprec.telnyx.com',
            name: 'my-siprec-connector',
            port: 5060,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->siprecConnectors->delete('connector_name');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
