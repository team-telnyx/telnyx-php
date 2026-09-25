<?php

namespace Tests\Services\AI\Memory;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NamespacesTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->retrieve(
            'operation_id',
            namespace: 'namespace'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NamespaceGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->retrieve(
            'operation_id',
            namespace: 'namespace'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NamespaceGetResponse::class, $result);
    }
}
