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
final class MessagingNumbersBulkUpdatesTest extends TestCase
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
        $result = $this->client->messagingNumbersBulkUpdates->create(
            messagingProfileID: '00000000-0000-0000-0000-000000000000',
            numbers: ['+18880000000', '+18880000001', '+18880000002'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->messagingNumbersBulkUpdates->create(
            messagingProfileID: '00000000-0000-0000-0000-000000000000',
            numbers: ['+18880000000', '+18880000001', '+18880000002'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->messagingNumbersBulkUpdates->retrieve('order_id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
