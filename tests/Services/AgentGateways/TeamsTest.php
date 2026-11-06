<?php

namespace Tests\Services\AgentGateways;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\Teams\AgentGatewayTeamResponse;
use Telnyx\AgentGateways\Teams\TeamListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TeamsTest extends TestCase
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

        $result = $this->client->agentGateways->teams->create(
            'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
            name: 'support'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayTeamResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->teams->create(
            'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
            name: 'support',
            budgetResetsEvery: '30d',
            maxBudget: 50,
            models: ['GLM-5.3-Flash', 'Qwen3.8-27B-nothink'],
            requestsPerMinute: 120,
            tokensPerMinute: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayTeamResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->teams->update(
            '0b6c5d4e-3f2a-4b1c-9d8e-7f6a5b4c3d2e',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayTeamResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->teams->update(
            '0b6c5d4e-3f2a-4b1c-9d8e-7f6a5b4c3d2e',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
            blocked: true,
            budgetResetsEvery: '30d',
            maxBudget: 100,
            models: ['x'],
            name: 'x',
            requestsPerMinute: 1,
            tokensPerMinute: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayTeamResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->teams->list(
            'ecffdf4b-93ea-4a7b-8295-51dfd2077996'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TeamListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->teams->delete(
            '0b6c5d4e-3f2a-4b1c-9d8e-7f6a5b4c3d2e',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayTeamResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->teams->delete(
            '0b6c5d4e-3f2a-4b1c-9d8e-7f6a5b4c3d2e',
            instanceID: 'ecffdf4b-93ea-4a7b-8295-51dfd2077996',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayTeamResponse::class, $result);
    }
}
