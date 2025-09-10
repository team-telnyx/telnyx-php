<?php

namespace Tests\Services\PhoneNumbers;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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
        $result = $this->client->phoneNumbers->jobs->retrieve('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->phoneNumbers->jobs->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatch(): void
    {
        $result = $this->client->phoneNumbers->jobs->deleteBatch(
            ['+19705555098', '+19715555098', '32873127836']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteBatchWithOptionalParams(): void
    {
        $result = $this->client->phoneNumbers->jobs->deleteBatch(
            ['+19705555098', '+19715555098', '32873127836']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatch(): void
    {
        $result = $this->client->phoneNumbers->jobs->updateBatch(
            phoneNumbers: ['1583466971586889004', '+13127367254']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateBatchWithOptionalParams(): void
    {
        $result = $this->client->phoneNumbers->jobs->updateBatch(
            phoneNumbers: ['1583466971586889004', '+13127367254']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateEmergencySettingsBatch(): void
    {
        $result = $this->client->phoneNumbers->jobs->updateEmergencySettingsBatch(
            emergencyEnabled: true,
            phoneNumbers: ['+19705555098', '+19715555098', '32873127836'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateEmergencySettingsBatchWithOptionalParams(): void
    {
        $result = $this->client->phoneNumbers->jobs->updateEmergencySettingsBatch(
            emergencyEnabled: true,
            phoneNumbers: ['+19705555098', '+19715555098', '32873127836'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
