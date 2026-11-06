<?php

namespace Tests\Services\AgentGateways;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachmentResponse;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentListResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PolicyAttachmentsTest extends TestCase
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

        $result = $this->client->agentGateways->policyAttachments->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            policy: 'strict'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayPolicyAttachmentResponse::class,
            $result
        );
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->policyAttachments->create(
            '32ce035d-3165-4031-b1a7-a7c0c259590a',
            policy: 'strict',
            default: true,
            models: ['GLM-5.3*'],
            priority: 10,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayPolicyAttachmentResponse::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->policyAttachments->list(
            '32ce035d-3165-4031-b1a7-a7c0c259590a'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PolicyAttachmentListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->policyAttachments->delete(
            '3394712f-2ad5-428a-8a3d-7a08d4b2906d',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayPolicyAttachmentResponse::class,
            $result
        );
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->agentGateways->policyAttachments->delete(
            '3394712f-2ad5-428a-8a3d-7a08d4b2906d',
            instanceID: '32ce035d-3165-4031-b1a7-a7c0c259590a',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AgentGatewayPolicyAttachmentResponse::class,
            $result
        );
    }
}
