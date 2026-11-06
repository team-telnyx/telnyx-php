<?php

namespace Tests\Services\LlmTokenGateway;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\BudgetDuration;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TokenGroupsTest extends TestCase
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

        $result = $this->client->llmTokenGateway->tokenGroups->create(
            allowedModels: ['Kimi-K3', 'GLM-5.3-Flash'],
            name: 'support-backend',
            idempotencyKey: 'Idempotency-Key',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenGroupResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenGroups->create(
            allowedModels: ['Kimi-K3', 'GLM-5.3-Flash'],
            name: 'support-backend',
            idempotencyKey: 'Idempotency-Key',
            blocked: true,
            budgetDuration: BudgetDuration::BUDGET_DURATION_1_D,
            cacheTtl: 1,
            fallbacks: ['Kimi-K3' => ['GLM-5.3-Flash']],
            guardrails: [
                'dlp' => [
                    'profiles' => ['financial'],
                    'prompt' => 'ignore',
                    'response' => 'ignore',
                ],
                'secrets' => ['prompt' => 'ignore', 'response' => 'ignore'],
                'streaming' => 'buffered',
            ],
            maxBudget: 0,
            maxParallelRequests: 20,
            providerKeyIDs: ['182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
            retries: [
                'maxAttempts' => 2,
                'backoff' => 'exponential',
                'requestTimeoutMs' => 10000,
                'retryDelayMs' => 250,
            ],
            rpmLimit: 0,
            tpmLimit: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenGroupResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenGroups->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenGroupResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenGroups->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenGroupResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenGroups->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
            allowedModels: ['Kimi-K3', 'GLM-5.3-Flash'],
            blocked: true,
            budgetDuration: BudgetDuration::BUDGET_DURATION_1_D,
            cacheTtl: 1,
            fallbacks: ['Kimi-K3' => ['GLM-5.3-Flash']],
            guardrails: [
                'dlp' => [
                    'profiles' => ['financial'],
                    'prompt' => 'ignore',
                    'response' => 'ignore',
                ],
                'secrets' => ['prompt' => 'ignore', 'response' => 'ignore'],
                'streaming' => 'buffered',
            ],
            maxBudget: 0,
            maxParallelRequests: 20,
            name: 'support-backend',
            providerKeyIDs: ['182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
            retries: [
                'maxAttempts' => 2,
                'backoff' => 'exponential',
                'requestTimeoutMs' => 10000,
                'retryDelayMs' => 250,
            ],
            rpmLimit: 0,
            tpmLimit: 0,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TokenGroupResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->llmTokenGateway->tokenGroups->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(TokenGroup::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->llmTokenGateway->tokenGroups->delete(
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

        $result = $this->client->llmTokenGateway->tokenGroups->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            idempotencyKey: 'Idempotency-Key',
            ifMatch: 'If-Match',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
