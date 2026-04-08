<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Enterprises\EnterpriseGetResponse;
use Telnyx\Enterprises\EnterpriseListResponse;
use Telnyx\Enterprises\EnterpriseNewResponse;
use Telnyx\Enterprises\EnterpriseUpdateResponse;
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
                'administrativeArea' => 'Illinois',
                'city' => 'Chicago',
                'country' => 'United States',
                'postalCode' => '60601',
                'streetAddress' => '123 Main St',
            ],
            billingContact: [
                'email' => 'billing@acme.com',
                'firstName' => 'John',
                'lastName' => 'Doe',
                'phoneNumber' => '15551234568',
            ],
            countryCode: 'US',
            doingBusinessAs: 'Acme',
            fein: '12-3456789',
            industry: 'technology',
            legalName: 'Acme Corp Inc.',
            numberOfEmployees: '51-200',
            organizationContact: [
                'email' => 'jane.smith@acme.com',
                'firstName' => 'Jane',
                'jobTitle' => 'VP of Engineering',
                'lastName' => 'Smith',
                'phone' => '+16035551234',
            ],
            organizationLegalType: 'corporation',
            organizationPhysicalAddress: [
                'administrativeArea' => 'Illinois',
                'city' => 'Chicago',
                'country' => 'United States',
                'postalCode' => '60601',
                'streetAddress' => '123 Main St',
            ],
            organizationType: 'commercial',
            website: 'https://acme.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterpriseNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->create(
            billingAddress: [
                'administrativeArea' => 'Illinois',
                'city' => 'Chicago',
                'country' => 'United States',
                'postalCode' => '60601',
                'streetAddress' => '123 Main St',
                'extendedAddress' => 'Suite 400',
            ],
            billingContact: [
                'email' => 'billing@acme.com',
                'firstName' => 'John',
                'lastName' => 'Doe',
                'phoneNumber' => '15551234568',
            ],
            countryCode: 'US',
            doingBusinessAs: 'Acme',
            fein: '12-3456789',
            industry: 'technology',
            legalName: 'Acme Corp Inc.',
            numberOfEmployees: '51-200',
            organizationContact: [
                'email' => 'jane.smith@acme.com',
                'firstName' => 'Jane',
                'jobTitle' => 'VP of Engineering',
                'lastName' => 'Smith',
                'phone' => '+16035551234',
            ],
            organizationLegalType: 'corporation',
            organizationPhysicalAddress: [
                'administrativeArea' => 'Illinois',
                'city' => 'Chicago',
                'country' => 'United States',
                'postalCode' => '60601',
                'streetAddress' => '123 Main St',
                'extendedAddress' => 'Suite 400',
            ],
            organizationType: 'commercial',
            website: 'https://acme.com',
            corporateRegistrationNumber: 'corporate_registration_number',
            customerReference: 'customer_reference',
            dunBradstreetNumber: 'dun_bradstreet_number',
            primaryBusinessDomainSicCode: '7372',
            professionalLicenseNumber: 'professional_license_number',
            roleType: 'enterprise',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterpriseNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterpriseGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->update(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(EnterpriseUpdateResponse::class, $result);
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
            $this->assertInstanceOf(EnterpriseListResponse::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->enterprises->delete(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
