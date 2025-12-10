<?php

namespace Tests\Services\Number10dlc\Brand;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpGetStatusResponse;
use Telnyx\Number10dlc\Brand\SMSOtp\SMSOtpTriggerResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class SMSOtpTest extends TestCase
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
    public function testGetStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->smsOtp->getStatus('OTP4B2001');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SMSOtpGetStatusResponse::class, $result);
    }

    #[Test]
    public function testTrigger(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->smsOtp->trigger(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            pinSMS: 'Your PIN is @OTP_PIN@',
            successSMS: 'Verification successful!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SMSOtpTriggerResponse::class, $result);
    }

    #[Test]
    public function testTriggerWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->smsOtp->trigger(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            pinSMS: 'Your PIN is @OTP_PIN@',
            successSMS: 'Verification successful!',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SMSOtpTriggerResponse::class, $result);
    }

    #[Test]
    public function testVerify(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->smsOtp->verify(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            otpPin: '123456'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testVerifyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->brand->smsOtp->verify(
            '4b20019b-043a-78f8-0657-b3be3f4b4002',
            otpPin: '123456'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
