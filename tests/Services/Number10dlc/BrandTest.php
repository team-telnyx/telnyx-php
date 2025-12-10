<?php

namespace Tests\Services\Number10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Brand\AltBusinessIDType;
use Telnyx\Brand\BrandIdentityStatus;
use Telnyx\Brand\EntityType;
use Telnyx\Brand\StockExchange;
use Telnyx\Brand\TelnyxBrand;
use Telnyx\Brand\Vertical;
use Telnyx\Client;
use Telnyx\Number10dlc\Brand\BrandGetResponse;
use Telnyx\Number10dlc\Brand\BrandListResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BrandTest extends TestCase
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

        $result = $this->client->number10dlc->brand->create(
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::PRIVATE_PROFIT,
            vertical: Vertical::TECHNOLOGY,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxBrand::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->create(
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::PRIVATE_PROFIT,
            vertical: Vertical::TECHNOLOGY,
            businessContactEmail: 'name@example.com',
            city: 'New York',
            companyName: 'ABC Inc.',
            ein: '111111111',
            firstName: 'John',
            ipAddress: 'ipAddress',
            isReseller: true,
            lastName: 'Smith',
            mobilePhone: '+12024567890',
            mock: true,
            phone: '+12024567890',
            postalCode: '10001',
            state: 'NY',
            stockExchange: StockExchange::NASDAQ,
            stockSymbol: 'ABC',
            street: '123',
            webhookFailoverURL: 'https://webhook.com/9010a453-4df8-4be6-a551-1070892888d6',
            webhookURL: 'https://webhook.com/67ea78a8-9f32-4d04-b62d-f9502e8e5f93',
            website: 'http://www.abcmobile.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxBrand::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->retrieve('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->update(
            'brandId',
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::PRIVATE_PROFIT,
            vertical: Vertical::TECHNOLOGY,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxBrand::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->update(
            'brandId',
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::PRIVATE_PROFIT,
            vertical: Vertical::TECHNOLOGY,
            altBusinessID: 'altBusiness_id',
            altBusinessIDType: AltBusinessIDType::NONE,
            businessContactEmail: 'name@example.com',
            city: 'New York',
            companyName: 'ABC Inc.',
            ein: '111111111',
            firstName: 'John',
            identityStatus: BrandIdentityStatus::VERIFIED,
            ipAddress: 'ipAddress',
            isReseller: true,
            lastName: 'Smith',
            phone: '+12024567890',
            postalCode: '10001',
            state: 'NY',
            stockExchange: StockExchange::NASDAQ,
            stockSymbol: 'ABC',
            street: '123',
            webhookFailoverURL: 'https://webhook.com/9010a453-4df8-4be6-a551-1070892888d6',
            webhookURL: 'https://webhook.com/67ea78a8-9f32-4d04-b62d-f9502e8e5f93',
            website: 'http://www.abcmobile.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxBrand::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->delete('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function test2faEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->_2faEmail('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testUpdateRevet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->updateRevet('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxBrand::class, $result);
    }
}
