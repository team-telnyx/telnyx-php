<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class AdditionalDocumentsTest extends TestCase
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
        $result = $this->client->portingOrders->additionalDocuments->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->portingOrders->additionalDocuments->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->portingOrders->additionalDocuments->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->portingOrders->additionalDocuments->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
