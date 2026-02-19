<?php

namespace Tests\Services\Messaging10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\Brand\AltBusinessIDType;
use Telnyx\Messaging10dlc\Brand\BrandGetFeedbackResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetSMSOtpByReferenceResponse;
use Telnyx\Messaging10dlc\Brand\BrandGetSMSOtpStatusResponse;
use Telnyx\Messaging10dlc\Brand\BrandIdentityStatus;
use Telnyx\Messaging10dlc\Brand\BrandListResponse;
use Telnyx\Messaging10dlc\Brand\BrandTriggerSMSOtpResponse;
use Telnyx\Messaging10dlc\Brand\EntityType;
use Telnyx\Messaging10dlc\Brand\StockExchange;
use Telnyx\Messaging10dlc\Brand\TelnyxBrand;
use Telnyx\Messaging10dlc\Brand\Vertical;
use Telnyx\PerPagePaginationV2;
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

        $result = $this->client->messaging10dlc->brand->create(
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->create(
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->retrieve('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->update(
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->update(
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
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $page = $this->client->messaging10dlc->brand->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(PerPagePaginationV2::class, $page);

        if ($item = $page->getItems()[0] ?? null) {
            // @phpstan-ignore-next-line method.alreadyNarrowedType
            $this->assertInstanceOf(BrandListResponse::class, $item);
        }
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->delete('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testGetFeedback(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->getFeedback('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandGetFeedbackResponse::class, $result);
    }

    #[Test]
    public function testGetSMSOtpByReference(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->getSMSOtpByReference(
            'OTP4B2001'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandGetSMSOtpByReferenceResponse::class, $result);
    }

    #[Test]
    public function testResend2faEmail(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->resend2faEmail('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveSMSOtpStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->retrieveSMSOtpStatus(
            '4b20019b-043a-78f8-0657-b3be3f4b4002'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandGetSMSOtpStatusResponse::class, $result);
    }

    #[Test]
    public function testRevet(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->revet('brandId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxBrand::class, $result);
    }

    #[Test]
    public function testTriggerSMSOtp(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->triggerSMSOtp(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            pinSMS: 'Your PIN is @OTP_PIN@',
            successSMS: 'Verification successful!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandTriggerSMSOtpResponse::class, $result);
    }

    #[Test]
    public function testTriggerSMSOtpWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->triggerSMSOtp(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            pinSMS: 'Your PIN is @OTP_PIN@',
            successSMS: 'Verification successful!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(BrandTriggerSMSOtpResponse::class, $result);
    }

    #[Test]
    public function testVerifySMSOtp(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->verifySMSOtp(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            otpPin: '123456'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testVerifySMSOtpWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->messaging10dlc->brand->verifySMSOtp(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            otpPin: '123456'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
