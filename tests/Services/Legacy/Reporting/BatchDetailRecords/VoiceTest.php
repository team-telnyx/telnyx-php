<?php

namespace Tests\Services\Legacy\Reporting\BatchDetailRecords;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetFieldsResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Voice\VoiceNewResponse;
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
            ->legacy
            ->reporting
            ->batchDetailRecords
            ->voice
            ->create(
                endTime: new \DateTimeImmutable('2024-02-12T23:59:59Z'),
                startTime: new \DateTimeImmutable('2024-02-01T00:00:00Z'),
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VoiceNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->legacy
            ->reporting
            ->batchDetailRecords
            ->voice
            ->create(
                endTime: new \DateTimeImmutable('2024-02-12T23:59:59Z'),
                startTime: new \DateTimeImmutable('2024-02-01T00:00:00Z'),
                callTypes: [1, 2],
                connections: [123, 456],
                fields: ['call_leg_id', 'start_time', 'end_time'],
                filters: [
                    [
                        'billingGroup' => 'adfaa016-f921-4b6c-97bb-e4c1dad231c5',
                        'cld' => '+13129457420',
                        'cldFilter' => 'contains',
                        'cli' => '+13129457420',
                        'cliFilter' => 'contains',
                        'filterType' => 'and',
                        'tagsList' => 'tag1',
                    ],
                ],
                includeAllMetadata: true,
                managedAccounts: [
                    'f47ac10b-58cc-4372-a567-0e02b2c3d479',
                    '6ba7b810-9dad-11d1-80b4-00c04fd430c8',
                ],
                recordTypes: [1, 2],
                reportName: 'My CDR Report',
                selectAllManagedAccounts: false,
                source: 'calls',
                timezone: 'UTC',
            )
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VoiceNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->legacy
            ->reporting
            ->batchDetailRecords
            ->voice
            ->retrieve('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VoiceGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->legacy->reporting->batchDetailRecords->voice->list(
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VoiceListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->legacy
            ->reporting
            ->batchDetailRecords
            ->voice
            ->delete('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VoiceDeleteResponse::class, $result);
    }

    #[Test]
    public function testRetrieveFields(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->legacy
            ->reporting
            ->batchDetailRecords
            ->voice
            ->retrieveFields()
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VoiceGetFieldsResponse::class, $result);
    }
}
