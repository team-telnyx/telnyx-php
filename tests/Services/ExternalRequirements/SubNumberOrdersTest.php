<?php

namespace Tests\Services\ExternalRequirements;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderGetResponse;
use Telnyx\ExternalRequirements\SubNumberOrders\SubNumberOrderUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SubNumberOrdersTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalRequirements->subNumberOrders->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            regulatoryRequirementID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubNumberOrderGetResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalRequirements->subNumberOrders->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            regulatoryRequirementID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubNumberOrderGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalRequirements->subNumberOrders->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            regulatoryRequirementID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            requirement: ['firstName' => 'Jane', 'lastName' => 'Doe'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubNumberOrderUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->externalRequirements->subNumberOrders->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            regulatoryRequirementID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            requirement: ['firstName' => 'Jane', 'lastName' => 'Doe'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SubNumberOrderUpdateResponse::class, $result);
    }
}
