<?php

namespace Tests\Services\AI\Collections;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Collections\Sources\SourceListResponse;
use Telnyx\AI\Collections\Sources\SourceNewResponse;
use Telnyx\AI\Collections\Sources\SourceReplaceResponse;
use Telnyx\AI\Collections\Sources\SourceType;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SourcesTest extends TestCase
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

        $result = $this->client->ai->collections->sources->create(
            '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e',
            sourceType: SourceType::VOICE
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SourceNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->collections->sources->create(
            '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e',
            sourceType: SourceType::VOICE,
            bucketID: 'policy-docs',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SourceNewResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->collections->sources->list(
            '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SourceListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->collections->sources->delete(
            '42',
            uuid: '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e'
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

        $result = $this->client->ai->collections->sources->delete(
            '42',
            uuid: '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testReplace(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->collections->sources->replace(
            '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e',
            sources: [['sourceType' => SourceType::VOICE]],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SourceReplaceResponse::class, $result);
    }

    #[Test]
    public function testReplaceWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->collections->sources->replace(
            '6a09ccbd-8f9b-4c3a-9b0e-2f1d3c4b5a6e',
            sources: [
                ['sourceType' => SourceType::VOICE, 'bucketID' => 'policy-docs'],
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SourceReplaceResponse::class, $result);
    }
}
