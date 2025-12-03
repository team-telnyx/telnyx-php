<?php

namespace Tests\Services\PhoneNumberBlocks;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumberBlocks\Jobs\JobDeletePhoneNumberBlockResponse;
use Telnyx\PhoneNumberBlocks\Jobs\JobGetResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class JobsTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumberBlocks->jobs->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobGetResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumberBlocks->jobs->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $result);
    }

    #[Test]
    public function testDeletePhoneNumberBlock(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumberBlocks->jobs->deletePhoneNumberBlock([
            'phone_number_block_id' => 'f3946371-7199-4261-9c3d-81a0d7935146',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobDeletePhoneNumberBlockResponse::class, $result);
    }

    #[Test]
    public function testDeletePhoneNumberBlockWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumberBlocks->jobs->deletePhoneNumberBlock([
            'phone_number_block_id' => 'f3946371-7199-4261-9c3d-81a0d7935146',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(JobDeletePhoneNumberBlockResponse::class, $result);
    }
}
