<?php

namespace Tests\Services\AgentGateways;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\APIs\AgentGatewayAPIResponse;
use Telnyx\AgentGateways\APIs\APIListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class APIsTest extends TestCase
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

        $result = $this->client->agentGateways->apis->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            name: 'petstore',
            specURL: 'https://petstore3.swagger.io/api/v3/openapi.json',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayAPIResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->apis->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            name: 'petstore',
            specURL: 'https://petstore3.swagger.io/api/v3/openapi.json',
            auth: ['type' => 'none'],
            baseURL: 'https://petstore3.swagger.io/api/v3',
            forwardedHeaders: ['string'],
            openToEveryKey: true,
            staticHeaders: ['foo' => 'string'],
            tools: ['string'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayAPIResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->apis->update(
            'dbe53cc0-bf7e-4f7a-8d84-752d19890eb3',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayAPIResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->apis->update(
            'dbe53cc0-bf7e-4f7a-8d84-752d19890eb3',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
            auth: ['type' => 'none'],
            baseURL: 'base_url',
            forwardedHeaders: ['string'],
            name: 'name',
            openToEveryKey: true,
            specURL: 'spec_url',
            staticHeaders: ['foo' => 'string'],
            tools: ['findpetsbystatus', 'getpetbyid'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayAPIResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->apis->list(
            '32ce035d-3165-4031-b1a7-a7c0c259590a'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(APIListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->apis->delete(
            'dbe53cc0-bf7e-4f7a-8d84-752d19890eb3',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayAPIResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->apis->delete(
            'dbe53cc0-bf7e-4f7a-8d84-752d19890eb3',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayAPIResponse::class, $result);
    }
}
