<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Verifications\CreateVerificationResponse;
use Telnyx\Verifications\VerificationGetResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VerificationsTest extends TestCase
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
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->retrieve(
            '12ade33a-21c0-473b-b055-b3c836e1c292'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationGetResponse::class, $result);
    }

    #[Test]
    public function testTriggerCall(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->triggerCall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreateVerificationResponse::class, $result);
    }

    #[Test]
    public function testTriggerCallWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->triggerCall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
            customCode: '43612',
            extension: '1www2WABCDw9',
            timeoutSecs: 300,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreateVerificationResponse::class, $result);
    }

    #[Test]
    public function testTriggerFlashcall(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->triggerFlashcall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreateVerificationResponse::class, $result);
    }

    #[Test]
    public function testTriggerFlashcallWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->triggerFlashcall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
            timeoutSecs: 300,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreateVerificationResponse::class, $result);
    }

    #[Test]
    public function testTriggerSMS(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->triggerSMS(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreateVerificationResponse::class, $result);
    }

    #[Test]
    public function testTriggerSMSWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->triggerSMS(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
            customCode: '43612',
            timeoutSecs: 300,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CreateVerificationResponse::class, $result);
    }
}
