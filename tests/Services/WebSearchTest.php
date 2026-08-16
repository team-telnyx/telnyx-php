<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\WebSearch\WebSearchContentsResponse;
use Telnyx\WebSearch\WebSearchNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class WebSearchTest extends TestCase
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

        $result = $this->client->webSearch->create(
            query: 'latest AI agent frameworks'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WebSearchNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webSearch->create(
            query: 'latest AI agent frameworks',
            count: 10,
            country: 'US',
            excludeDomains: ['pinterest.com'],
            freshness: 'week',
            includeDomains: ['arxiv.org', 'github.com'],
            livecrawl: false,
            safesearch: 'moderate',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WebSearchNewResponse::class, $result);
    }

    #[Test]
    public function testContents(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webSearch->contents(
            urls: ['https://en.wikipedia.org/wiki/Artificial_intelligence']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WebSearchContentsResponse::class, $result);
    }

    #[Test]
    public function testContentsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->webSearch->contents(
            urls: ['https://en.wikipedia.org/wiki/Artificial_intelligence'],
            crawlTimeout: 10,
            formats: ['markdown', 'metadata'],
            maxAge: null,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(WebSearchContentsResponse::class, $result);
    }
}
