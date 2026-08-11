<?php

namespace Tests\Services\Rcs;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Rcs\Brands\BrandLegalEntityType;
use Telnyx\Rcs\Brands\BrandOrganizationType;
use Telnyx\Rcs\Brands\BrandResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BrandsTest extends TestCase
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

        $result = $this->client->rcs->brands->create(
            addresses: [
                'primary' => [
                    'administrativeArea' => 'IL',
                    'city' => 'Chicago',
                    'countryCode' => 'US',
                    'line1' => '1 Main Street',
                    'postalCode' => '60601',
                ],
            ],
            contacts: [
                'brand' => [
                    'contactType' => 'BRAND',
                    'email' => 'jane@example.com',
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'phoneNumber' => '+13125550100',
                ],
            ],
            displayName: 'Acme',
            identifiers: [
                'ein' => ['identifierType' => 'EIN', 'value' => '12-3456789'],
            ],
            legalEntityType: BrandLegalEntityType::LIMITED_LIABILITY_COMPANY,
            legalName: 'Acme LLC',
            organizationType: BrandOrganizationType::PRIVATE_PROFIT,
            websiteURL: 'https://www.example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->brands->create(
            addresses: [
                'primary' => [
                    'administrativeArea' => 'IL',
                    'city' => 'Chicago',
                    'countryCode' => 'US',
                    'line1' => '1 Main Street',
                    'postalCode' => '60601',
                    'line2' => 'x',
                ],
            ],
            contacts: [
                'brand' => [
                    'contactType' => 'BRAND',
                    'email' => 'jane@example.com',
                    'firstName' => 'Jane',
                    'lastName' => 'Doe',
                    'phoneNumber' => '+13125550100',
                    'title' => 'Messaging Operations Manager',
                ],
            ],
            displayName: 'Acme',
            identifiers: [
                'ein' => ['identifierType' => 'EIN', 'value' => '12-3456789'],
                'stockSymbol' => [
                    'identifierType' => 'STOCK_SYMBOL', 'value' => 'J!Q0Ok0bzJb7:pro',
                ],
            ],
            legalEntityType: BrandLegalEntityType::LIMITED_LIABILITY_COMPANY,
            legalName: 'Acme LLC',
            organizationType: BrandOrganizationType::PRIVATE_PROFIT,
            websiteURL: 'https://www.example.com',
            profileID: '40000000-0000-0000-0000-000000000001',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->brands->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->brands->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->brands->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testSubmit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->brands->submit(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandResponse::class, $result);
    }
}
