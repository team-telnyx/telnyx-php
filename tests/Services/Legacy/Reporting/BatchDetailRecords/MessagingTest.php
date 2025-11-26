<?php

namespace Tests\Services\Legacy\Reporting\BatchDetailRecords;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\Messaging\MessagingNewResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MessagingTest extends TestCase
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
            ->messaging
            ->create([
                'end_time' => '2024-02-12T23:59:59Z',
                'start_time' => '2024-02-01T00:00:00Z',
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagingNewResponse::class, $result);
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
            ->messaging
            ->create([
                'end_time' => '2024-02-12T23:59:59Z',
                'start_time' => '2024-02-01T00:00:00Z',
                'connections' => [123, 456],
                'directions' => [1, 2],
                'filters' => [
                    [
                        'billing_group' => 'adfaa016-f921-4b6c-97bb-e4c1dad231c5',
                        'cld' => '+13129457420',
                        'cld_filter' => 'contains',
                        'cli' => '+13129457420',
                        'cli_filter' => 'contains',
                        'filter_type' => 'and',
                        'tags_list' => 'tag1',
                    ],
                ],
                'include_message_body' => true,
                'managed_accounts' => [
                    'f47ac10b-58cc-4372-a567-0e02b2c3d479',
                    '6ba7b810-9dad-11d1-80b4-00c04fd430c8',
                ],
                'profiles' => [
                    '3fa85f64-5717-4562-b3fc-2c963f66afa6',
                    '7d4e3f8a-9b2c-4e1d-8f5a-1a2b3c4d5e6f',
                ],
                'record_types' => [1, 2],
                'report_name' => 'My MDR Report',
                'select_all_managed_accounts' => false,
                'timezone' => 'UTC',
            ])
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagingNewResponse::class, $result);
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
            ->messaging
            ->retrieve('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagingGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->legacy
            ->reporting
            ->batchDetailRecords
            ->messaging
            ->list()
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagingListResponse::class, $result);
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
            ->messaging
            ->delete('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(MessagingDeleteResponse::class, $result);
    }
}
