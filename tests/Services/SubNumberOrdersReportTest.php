<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportGetResponse;
use Telnyx\SubNumberOrdersReport\SubNumberOrdersReportNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SubNumberOrdersReportTest extends TestCase
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
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->subNumberOrdersReport->create();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubNumberOrdersReportNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->subNumberOrdersReport->retrieve(
            '12ade33a-21c0-473b-b055-b3c836e1c293'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubNumberOrdersReportGetResponse::class, $result);
    }

    #[Test]
    public function testDownload(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->subNumberOrdersReport->download(
            '12ade33a-21c0-473b-b055-b3c836e1c293'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
