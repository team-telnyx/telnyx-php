<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;

/**
 * @internal
 */
#[CoversNothing]
final class MessagingHostedNumberOrdersTest extends TestCase
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
        $result = $this->client->messagingHostedNumberOrders->create();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->messagingHostedNumberOrders->retrieve('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->messagingHostedNumberOrders->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->messagingHostedNumberOrders->delete('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCheckEligibility(): void
    {
        $result = $this->client->messagingHostedNumberOrders->checkEligibility(
            ['string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCheckEligibilityWithOptionalParams(): void
    {
        $result = $this->client->messagingHostedNumberOrders->checkEligibility(
            ['string']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateVerificationCodes(): void
    {
        $result = $this
            ->client
            ->messagingHostedNumberOrders
            ->createVerificationCodes(
                'id',
                phoneNumbers: ['string'],
                verificationMethod: 'sms'
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateVerificationCodesWithOptionalParams(): void
    {
        $result = $this
            ->client
            ->messagingHostedNumberOrders
            ->createVerificationCodes(
                'id',
                phoneNumbers: ['string'],
                verificationMethod: 'sms'
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testValidateCodes(): void
    {
        $result = $this->client->messagingHostedNumberOrders->validateCodes(
            'id',
            [VerificationCode::with(code: 'code', phoneNumber: 'phone_number')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testValidateCodesWithOptionalParams(): void
    {
        $result = $this->client->messagingHostedNumberOrders->validateCodes(
            'id',
            [VerificationCode::with(code: 'code', phoneNumber: 'phone_number')]
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
