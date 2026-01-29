<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberDetailed;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PhoneNumbersTest extends TestCase
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

        $result = $this->client->phoneNumbers->retrieve('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->update('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->phoneNumbers->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PhoneNumberDetailed::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->phoneNumbers->delete('1293384261075731499');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberDeleteResponse::class, $result);
    }

    #[Test]
    public function testSlimList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $page = $this->client->phoneNumbers->slimList();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PhoneNumberSlimListResponse::class, $item);
        }
    }
}
