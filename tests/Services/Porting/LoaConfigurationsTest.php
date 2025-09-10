<?php

namespace Tests\Services\Porting;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Address;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Contact;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationCreateParams\Logo;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Address as Address2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Contact as Contact2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationPreview0Params\Logo as Logo2;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Address as Address1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Contact as Contact1;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateParams\Logo as Logo1;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class LoaConfigurationsTest extends TestCase
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
    public function testCreate(): void
    {
        $result = $this->client->porting->loaConfigurations->create(
            address: Address::with(
                city: 'Austin',
                countryCode: 'US',
                state: 'TX',
                streetAddress: '600 Congress Avenue',
                zipCode: '78701',
            ),
            companyName: 'Telnyx',
            contact: Contact::with(
                email: 'testing@telnyx.com',
                phoneNumber: '+12003270001'
            ),
            logo: Logo::with(documentID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'),
            name: 'My LOA Configuration',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->porting->loaConfigurations->create(
            address: Address::with(
                city: 'Austin',
                countryCode: 'US',
                state: 'TX',
                streetAddress: '600 Congress Avenue',
                zipCode: '78701',
            )
                ->withExtendedAddress('14th Floor'),
            companyName: 'Telnyx',
            contact: Contact::with(
                email: 'testing@telnyx.com',
                phoneNumber: '+12003270001'
            ),
            logo: Logo::with(documentID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'),
            name: 'My LOA Configuration',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->porting->loaConfigurations->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->porting->loaConfigurations->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            address: Address1::with(
                city: 'Austin',
                countryCode: 'US',
                state: 'TX',
                streetAddress: '600 Congress Avenue',
                zipCode: '78701',
            ),
            companyName: 'Telnyx',
            contact: Contact1::with(
                email: 'testing@telnyx.com',
                phoneNumber: '+12003270001'
            ),
            logo: Logo1::with(documentID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'),
            name: 'My LOA Configuration',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->porting->loaConfigurations->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            address: Address1::with(
                city: 'Austin',
                countryCode: 'US',
                state: 'TX',
                streetAddress: '600 Congress Avenue',
                zipCode: '78701',
            )
                ->withExtendedAddress('14th Floor'),
            companyName: 'Telnyx',
            contact: Contact1::with(
                email: 'testing@telnyx.com',
                phoneNumber: '+12003270001'
            ),
            logo: Logo1::with(documentID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'),
            name: 'My LOA Configuration',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->porting->loaConfigurations->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->porting->loaConfigurations->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPreview0(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support application/pdf responses");
        }

        $result = $this->client->porting->loaConfigurations->preview0(
            address: Address2::with(
                city: 'Austin',
                countryCode: 'US',
                state: 'TX',
                streetAddress: '600 Congress Avenue',
                zipCode: '78701',
            ),
            companyName: 'Telnyx',
            contact: Contact2::with(
                email: 'testing@telnyx.com',
                phoneNumber: '+12003270001'
            ),
            logo: Logo2::with(documentID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'),
            name: 'My LOA Configuration',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPreview0WithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support application/pdf responses");
        }

        $result = $this->client->porting->loaConfigurations->preview0(
            address: Address2::with(
                city: 'Austin',
                countryCode: 'US',
                state: 'TX',
                streetAddress: '600 Congress Avenue',
                zipCode: '78701',
            )
                ->withExtendedAddress('14th Floor'),
            companyName: 'Telnyx',
            contact: Contact2::with(
                email: 'testing@telnyx.com',
                phoneNumber: '+12003270001'
            ),
            logo: Logo2::with(documentID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'),
            name: 'My LOA Configuration',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPreview1(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support application/pdf responses");
        }

        $result = $this->client->porting->loaConfigurations->preview1(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
