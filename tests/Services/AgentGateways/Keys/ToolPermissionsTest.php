<?php

namespace Tests\Services\AgentGateways\Keys;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\Keys\ToolPermissions\AgentGatewayToolPermissionsResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ToolPermissionsTest extends TestCase
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

        $result = $this->client->agentGateways->keys->toolPermissions->create(
            'f739ad190d29e2a5e658c3a486111953e6c18d746fd04374962ab150aae17757',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
            servers: [['id' => '88d5a97b-4080-4855-8bac-a39811b1dc24']],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayToolPermissionsResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->toolPermissions->create(
            'f739ad190d29e2a5e658c3a486111953e6c18d746fd04374962ab150aae17757',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
            servers: [
                [
                    'id' => '88d5a97b-4080-4855-8bac-a39811b1dc24',
                    'tools' => ['get_order'],
                ],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayToolPermissionsResponse::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->toolPermissions->list(
            'f739ad190d29e2a5e658c3a486111953e6c18d746fd04374962ab150aae17757',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayToolPermissionsResponse::class,
            $result
        );
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->toolPermissions->list(
            'f739ad190d29e2a5e658c3a486111953e6c18d746fd04374962ab150aae17757',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayToolPermissionsResponse::class,
            $result
        );
    }
}
