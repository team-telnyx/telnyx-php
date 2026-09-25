<?php

namespace Tests\Services\AI\Memory\Namespaces;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileGetSummaryResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileIngestResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRecallResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\ProfileRememberResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class ProfilesTest extends TestCase
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

        $page = $this->client->ai->memory->namespaces->profiles->list('namespace');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ProfileListResponse::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->delete(
            'profile_id',
            namespace: 'namespace'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileDeleteResponse::class, $result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->delete(
            'profile_id',
            namespace: 'namespace'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileDeleteResponse::class, $result);
    }

    #[Test]
    public function testIngest(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->ingest(
            'profile_id',
            namespace: 'namespace',
            body: [(object) []]
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileIngestResponse::class, $result);
    }

    #[Test]
    public function testIngestWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->ingest(
            'profile_id',
            namespace: 'namespace',
            body: [(object) []],
            sessionID: 'session_id',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileIngestResponse::class, $result);
    }

    #[Test]
    public function testRecall(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->recall(
            'profile_id',
            namespace: 'namespace',
            query: 'where do invoices go?'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileRecallResponse::class, $result);
    }

    #[Test]
    public function testRecallWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->recall(
            'profile_id',
            namespace: 'namespace',
            query: 'where do invoices go?',
            topK: 5,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileRecallResponse::class, $result);
    }

    #[Test]
    public function testRemember(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->remember(
            'profile_id',
            namespace: 'namespace',
            text: 'Prefers window seats and flies out of ORD',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileRememberResponse::class, $result);
    }

    #[Test]
    public function testRememberWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->remember(
            'profile_id',
            namespace: 'namespace',
            text: 'Prefers window seats and flies out of ORD',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileRememberResponse::class, $result);
    }

    #[Test]
    public function testRetrieveSummary(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->retrieveSummary(
            'profile_id',
            namespace: 'namespace'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileGetSummaryResponse::class, $result);
    }

    #[Test]
    public function testRetrieveSummaryWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->memory->namespaces->profiles->retrieveSummary(
            'profile_id',
            namespace: 'namespace'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ProfileGetSummaryResponse::class, $result);
    }
}
