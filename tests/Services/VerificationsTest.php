<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

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
        $result = $this->client->verifications->retrieve(
            '12ade33a-21c0-473b-b055-b3c836e1c292'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTriggerCall(): void
    {
        $result = $this->client->verifications->triggerCall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTriggerCallWithOptionalParams(): void
    {
        $result = $this->client->verifications->triggerCall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTriggerFlashcall(): void
    {
        $result = $this->client->verifications->triggerFlashcall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTriggerFlashcallWithOptionalParams(): void
    {
        $result = $this->client->verifications->triggerFlashcall(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTriggerSMS(): void
    {
        $result = $this->client->verifications->triggerSMS(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTriggerSMSWithOptionalParams(): void
    {
        $result = $this->client->verifications->triggerSMS(
            phoneNumber: '+13035551234',
            verifyProfileID: '12ade33a-21c0-473b-b055-b3c836e1c292',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
