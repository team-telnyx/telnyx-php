<?php

namespace Tests\Services\LlmTokenGateway;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKey;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TokenKeysTest extends TestCase
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

        $result = $this->client->llmTokenGateway->tokenKeys->create(
            name: 'support-service',
            tokenGroupID: '11111111-1111-4111-8111-111111111111',
            idempotencyKey: 'Idempotency-Key',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenKeyResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenKeys->create(
            name: 'support-service',
            tokenGroupID: '11111111-1111-4111-8111-111111111111',
            idempotencyKey: 'Idempotency-Key',
            allowedModels: ['J!Q0Ok0bzJb7'],
            blocked: true,
            budgetDuration: BudgetDuration::_1D,
            expiresAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            maxBudget: 0.000001,
            maxParallelRequests: 5,
            requiredEndUserID: true,
            rpmLimit: 1,
            tokenUserID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            tpmLimit: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenKeyResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenKeys->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenKeyResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenKeys->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenKeyResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenKeys->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
            allowedModels: ['J!Q0Ok0bzJb7'],
            blocked: true,
            budgetDuration: BudgetDuration::_1D,
            expiresAt: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            maxBudget: 0.000001,
            maxParallelRequests: 5,
            name: 'name',
            requiredEndUserID: true,
            rpmLimit: 1,
            tpmLimit: 1,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenKeyResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->llmTokenGateway->tokenKeys->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(TokenKey::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenKeys->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
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

        $result = $this->client->llmTokenGateway->tokenKeys->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
