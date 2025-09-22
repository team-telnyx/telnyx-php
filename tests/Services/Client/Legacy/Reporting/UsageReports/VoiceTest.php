<?php

namespace Tests\Services\Client\Legacy\Reporting\UsageReports;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VoiceTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_legacy
            ->reporting
            ->usageReports
            ->voice
            ->create(
                endTime: new \DateTimeImmutable('2024-02-01T00:00:00Z'),
                startTime: new \DateTimeImmutable('2024-02-01T00:00:00Z'),
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_legacy
            ->reporting
            ->usageReports
            ->voice
            ->create(
                endTime: new \DateTimeImmutable('2024-02-01T00:00:00Z'),
                startTime: new \DateTimeImmutable('2024-02-01T00:00:00Z'),
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_legacy
            ->reporting
            ->usageReports
            ->voice
            ->retrieve('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_legacy
            ->reporting
            ->usageReports
            ->voice
            ->list()
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_legacy
            ->reporting
            ->usageReports
            ->voice
            ->delete('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
