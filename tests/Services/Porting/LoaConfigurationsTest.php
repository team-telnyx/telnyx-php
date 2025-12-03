<?php

namespace Tests\Services\Porting;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationGetResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationListResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationNewResponse;
use Telnyx\Porting\LoaConfigurations\LoaConfigurationUpdateResponse;
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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->create([
            'address' => [
                'city' => 'Austin',
                'country_code' => 'US',
                'state' => 'TX',
                'street_address' => '600 Congress Avenue',
                'zip_code' => '78701',
            ],
            'company_name' => 'Telnyx',
            'contact' => [
                'email' => 'testing@telnyx.com', 'phone_number' => '+12003270001',
            ],
            'logo' => ['document_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
            'name' => 'My LOA Configuration',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LoaConfigurationNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->create([
            'address' => [
                'city' => 'Austin',
                'country_code' => 'US',
                'state' => 'TX',
                'street_address' => '600 Congress Avenue',
                'zip_code' => '78701',
                'extended_address' => '14th Floor',
            ],
            'company_name' => 'Telnyx',
            'contact' => [
                'email' => 'testing@telnyx.com', 'phone_number' => '+12003270001',
            ],
            'logo' => ['document_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
            'name' => 'My LOA Configuration',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LoaConfigurationNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LoaConfigurationGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'address' => [
                    'city' => 'Austin',
                    'country_code' => 'US',
                    'state' => 'TX',
                    'street_address' => '600 Congress Avenue',
                    'zip_code' => '78701',
                ],
                'company_name' => 'Telnyx',
                'contact' => [
                    'email' => 'testing@telnyx.com', 'phone_number' => '+12003270001',
                ],
                'logo' => ['document_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
                'name' => 'My LOA Configuration',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LoaConfigurationUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'address' => [
                    'city' => 'Austin',
                    'country_code' => 'US',
                    'state' => 'TX',
                    'street_address' => '600 Congress Avenue',
                    'zip_code' => '78701',
                    'extended_address' => '14th Floor',
                ],
                'company_name' => 'Telnyx',
                'contact' => [
                    'email' => 'testing@telnyx.com', 'phone_number' => '+12003270001',
                ],
                'logo' => ['document_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
                'name' => 'My LOA Configuration',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LoaConfigurationUpdateResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->list([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(LoaConfigurationListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->porting->loaConfigurations->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testPreview0(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support application/pdf responses');
        }

        $result = $this->client->porting->loaConfigurations->preview0([
            'address' => [
                'city' => 'Austin',
                'country_code' => 'US',
                'state' => 'TX',
                'street_address' => '600 Congress Avenue',
                'zip_code' => '78701',
            ],
            'company_name' => 'Telnyx',
            'contact' => [
                'email' => 'testing@telnyx.com', 'phone_number' => '+12003270001',
            ],
            'logo' => ['document_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
            'name' => 'My LOA Configuration',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testPreview0WithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support application/pdf responses');
        }

        $result = $this->client->porting->loaConfigurations->preview0([
            'address' => [
                'city' => 'Austin',
                'country_code' => 'US',
                'state' => 'TX',
                'street_address' => '600 Congress Avenue',
                'zip_code' => '78701',
                'extended_address' => '14th Floor',
            ],
            'company_name' => 'Telnyx',
            'contact' => [
                'email' => 'testing@telnyx.com', 'phone_number' => '+12003270001',
            ],
            'logo' => ['document_id' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
            'name' => 'My LOA Configuration',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testPreview1(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism doesn\'t support application/pdf responses');
        }

        $result = $this->client->porting->loaConfigurations->preview1(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
