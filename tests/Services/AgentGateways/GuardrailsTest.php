<?php

namespace Tests\Services\AgentGateways;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\Guardrails\AgentGatewayGuardrailResponse;
use Telnyx\AgentGateways\Guardrails\GuardrailListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class GuardrailsTest extends TestCase
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

        $result = $this->client->agentGateways->guardrails->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            modes: ['before_request'],
            name: 'mask-pii',
            type: 'content_filter',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayGuardrailResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->guardrails->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            modes: ['before_request'],
            name: 'mask-pii',
            type: 'content_filter',
            alwaysOn: true,
            settings: ['patterns' => 'bar'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayGuardrailResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->guardrails->update(
            '9645e556-6532-4341-8cab-21b58cdef529',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayGuardrailResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->guardrails->update(
            '9645e556-6532-4341-8cab-21b58cdef529',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
            alwaysOn: true,
            modes: ['before_request'],
            name: 'name',
            settings: ['foo' => 'bar'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayGuardrailResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->guardrails->list(
            '32ce035d-3165-4031-b1a7-a7c0c259590a'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(GuardrailListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->guardrails->delete(
            '9645e556-6532-4341-8cab-21b58cdef529',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayGuardrailResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->guardrails->delete(
            '9645e556-6532-4341-8cab-21b58cdef529',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentGatewayGuardrailResponse::class, $result);
    }
}
