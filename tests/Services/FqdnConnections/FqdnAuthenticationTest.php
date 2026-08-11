<?php

namespace Tests\Services\FqdnConnections;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationListResponse;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FqdnAuthenticationTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fqdnConnections->fqdnAuthentication->list(
            'fqdn_connection_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnAuthenticationListResponse::class, $result);
    }

    #[Test]
    public function testPatchAll(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->fqdnConnections->fqdnAuthentication->patchAll(
            'fqdn_connection_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(FqdnAuthenticationPatchAllResponse::class, $result);
    }
}
