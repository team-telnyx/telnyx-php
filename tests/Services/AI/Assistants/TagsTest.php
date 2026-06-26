<?php

namespace Tests\Services\AI\Assistants;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AI\Assistants\Tags\TagsResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class TagsTest extends TestCase
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

        $result = $this->client->ai->assistants->tags->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagsResponse::class, $result);
    }

    #[Test]
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->assistants->tags->add(
            'assistant_id',
            tag: 'tag'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagsResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->assistants->tags->add(
            'assistant_id',
            tag: 'tag'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagsResponse::class, $result);
    }

    #[Test]
    public function testRemove(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->assistants->tags->remove(
            'tag',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagsResponse::class, $result);
    }

    #[Test]
    public function testRemoveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->ai->assistants->tags->remove(
            'tag',
            assistantID: 'assistant_id'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TagsResponse::class, $result);
    }
}
