<?php

namespace Tests\Services\Enterprises;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Dir;
use Telnyx\Dir\DirWrapped;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DirTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->dir->create(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            authorizerEmail: 'sam@acmeplumbing.example.com',
            authorizerName: 'Sam Owner',
            certifyBrandIsAccurate: true,
            certifyIPOwnership: true,
            certifyNoShaftContent: true,
            displayName: 'Acme Plumbing',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirWrapped::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->dir->create(
            '4a6192a4-573d-446d-b3ce-aff9117272a6',
            authorizerEmail: 'sam@acmeplumbing.example.com',
            authorizerName: 'Sam Owner',
            certifyBrandIsAccurate: true,
            certifyIPOwnership: true,
            certifyNoShaftContent: true,
            displayName: 'Acme Plumbing',
            callReasons: ['Appointment reminders', 'Billing inquiries'],
            documents: [
                [
                    'documentID' => '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
                    'documentType' => 'business_registration',
                    'description' => 'Certificate of incorporation.',
                ],
            ],
            logoURL: 'https://acmeplumbing.example.com/logo-256.bmp',
            reselling: false,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirWrapped::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->enterprises->dir->list(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(Dir::class, $item);
        }
    }
}
