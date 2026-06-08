<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\DirGetResponse;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsResponse;
use Telnyx\Dir\DirListResponse;
use Telnyx\Dir\DirSubmitResponse;
use Telnyx\Dir\DirUpdateInfringementResponse;
use Telnyx\Dir\DirUpdateResponse;
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->retrieve(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->update(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->dir->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(DirListResponse::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->delete(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testCreateLoa(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->createLoa(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            phoneNumbers: ['+13125550000']
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testCreateLoaWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->createLoa(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            phoneNumbers: ['+13125550000'],
            agent: [
                'administrativeArea' => 'administrative_area',
                'city' => 'city',
                'contactEmail' => 'dev@stainless.com',
                'contactName' => 'contact_name',
                'contactPhone' => '+13125550000',
                'contactTitle' => 'contact_title',
                'country' => 'US',
                'legalName' => 'legal_name',
                'postalCode' => 'postal_code',
                'streetAddress' => 'street_address',
                'dba' => 'dba',
                'extendedAddress' => 'extended_address',
            ],
            signature: ['imageBase64' => 'x', 'signerName' => 'signer_name'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testListDocumentTypes(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->listDocumentTypes();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirListDocumentTypesResponse::class, $result);
    }

    #[Test]
    public function testListInfringementClaims(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->dir->listInfringementClaims(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(DirListInfringementClaimsResponse::class, $item);
        }
    }

    #[Test]
    public function testSubmit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->submit(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirSubmitResponse::class, $result);
    }

    #[Test]
    public function testUpdateInfringement(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->updateInfringement(
            '16635d38-75a6-4481-82e8-69af60e05011',
            certifyBrandIsAccurate: true,
            certifyIPOwnership: true,
            certifyNoInfringement: true,
            certifyNoShaftContent: true,
            infringementResolutionNotes: 'Updated the display name to remove the disputed mark and re-uploaded the authorization.',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirUpdateInfringementResponse::class, $result);
    }

    #[Test]
    public function testUpdateInfringementWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->updateInfringement(
            '16635d38-75a6-4481-82e8-69af60e05011',
            certifyBrandIsAccurate: true,
            certifyIPOwnership: true,
            certifyNoInfringement: true,
            certifyNoShaftContent: true,
            infringementResolutionNotes: 'Updated the display name to remove the disputed mark and re-uploaded the authorization.',
            callReasons: ['string'],
            displayName: 'x',
            documents: [
                [
                    'documentID' => '2a7e8337-e803-4057-a4ae-26c40eb0bc6c',
                    'documentType' => 'business_registration',
                    'description' => 'Certificate of incorporation.',
                ],
            ],
            logoURL: 'logo_url',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DirUpdateInfringementResponse::class, $result);
    }
}
