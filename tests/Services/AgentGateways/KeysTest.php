<?php

namespace Tests\Services\AgentGateways;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\Keys\AgentGatewayKeyResponse;
use Telnyx\AgentGateways\Keys\KeyListResponse;
use Telnyx\AgentGateways\Keys\KeyNewResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class KeysTest extends TestCase
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

        $result = $this->client->agentGateways->keys->create(
            'ecffdf4b-93ea-4a7b-8295-51dfd2077996'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KeyNewResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->update(
            '5f1c3a0e9b7d4c2a8e6f0b1d3c5a7e9f2b4d6c8a0e1f3a5c7e9b1d3f5a7c9e0b',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayKeyResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->update(
            '5f1c3a0e9b7d4c2a8e6f0b1d3c5a7e9f2b4d6c8a0e1f3a5c7e9b1d3f5a7c9e0b',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
            blocked: true,
            budgetResetsEvery: '30d',
            expiresIn: '30d',
            maxBudget: 0,
            maxParallelRequests: 1,
            models: ['x'],
            name: 'x',
            requestsPerMinute: 1,
            teamID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            tokensPerMinute: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayKeyResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->list(
            'ecffdf4b-93ea-4a7b-8295-51dfd2077996'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(KeyListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->delete(
            '5f1c3a0e9b7d4c2a8e6f0b1d3c5a7e9f2b4d6c8a0e1f3a5c7e9b1d3f5a7c9e0b',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayKeyResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->keys->delete(
            '5f1c3a0e9b7d4c2a8e6f0b1d3c5a7e9f2b4d6c8a0e1f3a5c7e9b1d3f5a7c9e0b',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayKeyResponse::class, $result);
    }
}
