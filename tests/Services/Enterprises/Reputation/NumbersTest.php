<?php

namespace Tests\Services\Enterprises\Reputation;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\Reputation\Numbers\NumberRefreshResponse;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberList;
use Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumberWithReputation;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class NumbersTest extends TestCase
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

        $result = $this->client->enterprises->reputation->numbers->retrieve(
            '+19493253498',
            enterpriseID: '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ReputationPhoneNumberWithReputation::class,
            $result
        );
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->retrieve(
            '+19493253498',
            enterpriseID: '4a6192a4-573d-446d-b3ce-aff9117272a6',
            fresh: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            ReputationPhoneNumberWithReputation::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->enterprises->reputation->numbers->list(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(ReputationPhoneNumber::class, $item);
        }
    }

    #[Test]
    public function testAssociate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->associate(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            phoneNumbers: ['+19493253498', '+12134445566'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationPhoneNumberList::class, $result);
    }

    #[Test]
    public function testAssociateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->associate(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            phoneNumbers: ['+19493253498', '+12134445566'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(ReputationPhoneNumberList::class, $result);
    }

    #[Test]
    public function testDisassociate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->disassociate(
            '+19493253498',
            enterpriseID: '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testDisassociateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->disassociate(
            '+19493253498',
            enterpriseID: '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRefresh(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->refresh(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            phoneNumbers: ['+19493253498']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NumberRefreshResponse::class, $result);
    }

    #[Test]
    public function testRefreshWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->reputation->numbers->refresh(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            phoneNumbers: ['+19493253498']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(NumberRefreshResponse::class, $result);
    }
}
