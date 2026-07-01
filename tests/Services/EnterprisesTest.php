<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\EnterprisePublic;
use Telnyx\Enterprises\EnterprisePublicWrapped;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class EnterprisesTest extends TestCase
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

        $result = $this->client->enterprises->create(
            billingAddress: [
                'administrativeArea' => 'IL',
                'city' => 'Chicago',
                'country' => 'US',
                'postalCode' => '60601',
                'streetAddress' => '100 Main St',
            ],
            billingContact: [
                'email' => 'billing@run065.example.com',
                'firstName' => 'Alex',
                'lastName' => 'Bill',
                'phoneNumber' => '+13125550001',
            ],
            countryCode: 'US',
            doingBusinessAs: 'Run 065 Debug',
            fein: '12-3456789',
            industry: 'technology',
            jurisdictionOfIncorporation: 'Delaware',
            legalName: 'Run 065 Debug Co',
            numberOfEmployees: '51-200',
            organizationContact: [
                'email' => 'org@run065.example.com',
                'firstName' => 'Sam',
                'jobTitle' => 'Compliance Lead',
                'lastName' => 'Org',
                'phoneNumber' => '+13125550000',
            ],
            organizationLegalType: 'llc',
            organizationPhysicalAddress: [
                'administrativeArea' => 'IL',
                'city' => 'Chicago',
                'country' => 'US',
                'postalCode' => '60601',
                'streetAddress' => '100 Main St',
            ],
            organizationType: 'commercial',
            website: 'https://run065.example.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterprisePublicWrapped::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->create(
            billingAddress: [
                'administrativeArea' => 'IL',
                'city' => 'Chicago',
                'country' => 'US',
                'postalCode' => '60601',
                'streetAddress' => '100 Main St',
                'extendedAddress' => 'Suite 504',
            ],
            billingContact: [
                'email' => 'billing@run065.example.com',
                'firstName' => 'Alex',
                'lastName' => 'Bill',
                'phoneNumber' => '+13125550001',
            ],
            countryCode: 'US',
            doingBusinessAs: 'Run 065 Debug',
            fein: '12-3456789',
            industry: 'technology',
            jurisdictionOfIncorporation: 'Delaware',
            legalName: 'Run 065 Debug Co',
            numberOfEmployees: '51-200',
            organizationContact: [
                'email' => 'org@run065.example.com',
                'firstName' => 'Sam',
                'jobTitle' => 'Compliance Lead',
                'lastName' => 'Org',
                'phoneNumber' => '+13125550000',
            ],
            organizationLegalType: 'llc',
            organizationPhysicalAddress: [
                'administrativeArea' => 'IL',
                'city' => 'Chicago',
                'country' => 'US',
                'postalCode' => '60601',
                'streetAddress' => '100 Main St',
                'extendedAddress' => 'Suite 504',
            ],
            organizationType: 'commercial',
            website: 'https://run065.example.com',
            corporateRegistrationNumber: 'corporate_registration_number',
            customerReference: 'internal-id-12345',
            dunBradstreetNumber: 'dun_bradstreet_number',
            primaryBusinessDomainSicCode: 'primary_business_domain_sic_code',
            professionalLicenseNumber: 'professional_license_number',
            roleType: 'enterprise',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterprisePublicWrapped::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->retrieve(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterprisePublicWrapped::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->update(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterprisePublicWrapped::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->enterprises->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(EnterprisePublic::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->delete(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testBrandedCalling(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->brandedCalling(
            '4a6192a4-573d-446d-b3ce-aff9117272a6'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterprisePublicWrapped::class, $result);
    }
}
