<?php

namespace Tests\Services\Dir;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumbers\PhoneNumberAddResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\Dir\PhoneNumbers\PhoneNumberRemoveResponse;
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

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->dir->phoneNumbers->list(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(PhoneNumberListResponse::class, $item);
        }
    }

    #[Test]
    public function testAdd(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->phoneNumbers->add(
            '16635d38-75a6-4481-82e8-69af60e05011',
            documents: [
                [
                    'documentID' => '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
                    'documentType' => 'letter_of_authorization',
                ],
            ],
            phoneNumbers: ['+19493253498', '+12134445566'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberAddResponse::class, $result);
    }

    #[Test]
    public function testAddWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->phoneNumbers->add(
            '16635d38-75a6-4481-82e8-69af60e05011',
            documents: [
                [
                    'documentID' => '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
                    'documentType' => 'letter_of_authorization',
                    'description' => 'LOA authorising Telnyx to register these numbers under the DIR.',
                ],
            ],
            phoneNumbers: ['+19493253498', '+12134445566'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberAddResponse::class, $result);
    }

    #[Test]
    public function testRemove(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->phoneNumbers->remove(
            '16635d38-75a6-4481-82e8-69af60e05011',
            phoneNumbers: ['+19493253498']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberRemoveResponse::class, $result);
    }

    #[Test]
    public function testRemoveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->phoneNumbers->remove(
            '16635d38-75a6-4481-82e8-69af60e05011',
            phoneNumbers: ['+19493253498']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PhoneNumberRemoveResponse::class, $result);
    }
}
