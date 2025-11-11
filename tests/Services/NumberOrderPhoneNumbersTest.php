<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NumberOrderPhoneNumbersTest extends TestCase
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

        $result = $this->client->numberOrderPhoneNumbers->retrieve(
            'number_order_phone_number_id'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->numberOrderPhoneNumbers->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateRequirementGroup(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->numberOrderPhoneNumbers->updateRequirementGroup(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['requirement_group_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateRequirementGroupWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->numberOrderPhoneNumbers->updateRequirementGroup(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['requirement_group_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateRequirements(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->numberOrderPhoneNumbers->updateRequirements(
            'number_order_phone_number_id',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
