<?php

namespace Tests\Services\Email\IPPools;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Email\IPPools\IPs\IPNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class IPsTest extends TestCase
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

        $result = $this->client->email->ipPools->ips->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            dedicatedIPID: '6a7f9a30-1234-4b5c-8d9e-0f1a2b3c4d5e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IPNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->email->ipPools->ips->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            dedicatedIPID: '6a7f9a30-1234-4b5c-8d9e-0f1a2b3c4d5e',
            weight: 100,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(IPNewResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->email->ipPools->ips->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            id: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->email->ipPools->ips->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            id: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            drain: true,
            force: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
