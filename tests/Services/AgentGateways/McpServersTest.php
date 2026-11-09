<?php

namespace Tests\Services\AgentGateways;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\McpServers\AgentGatewayMcpServerResponse;
use Telnyx\AgentGateways\McpServers\McpServerListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class McpServersTest extends TestCase
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

        $result = $this->client->agentGateways->mcpServers->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            name: 'orders',
            url: 'http://10.40.3.7:9000/mcp',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayMcpServerResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->mcpServers->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            name: 'orders',
            url: 'http://10.40.3.7:9000/mcp',
            auth: [
                'type' => 'api_key',
                'value' => 'example-orders-key',
                'header' => 'header',
            ],
            forwardedHeaders: ['X-Request-Id'],
            openToEveryKey: true,
            staticHeaders: ['X-Env' => 'prod'],
            tools: ['string'],
            transport: 'http',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayMcpServerResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->mcpServers->update(
            '88d5a97b-4080-4855-8bac-a39811b1dc24',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayMcpServerResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->mcpServers->update(
            '88d5a97b-4080-4855-8bac-a39811b1dc24',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
            auth: ['type' => 'none'],
            forwardedHeaders: ['string'],
            name: 'name',
            openToEveryKey: true,
            staticHeaders: ['foo' => 'string'],
            tools: ['get_order', 'create_ticket'],
            transport: 'http',
            url: 'url',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayMcpServerResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->mcpServers->list(
            '32ce035d-3165-4031-b1a7-a7c0c259590a'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(McpServerListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->mcpServers->delete(
            '88d5a97b-4080-4855-8bac-a39811b1dc24',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayMcpServerResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->mcpServers->delete(
            '88d5a97b-4080-4855-8bac-a39811b1dc24',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayMcpServerResponse::class, $result);
    }
}
