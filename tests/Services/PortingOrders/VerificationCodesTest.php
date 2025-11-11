<?php

namespace Tests\Services\PortingOrders;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VerificationCodesTest extends TestCase
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
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->verificationCodes->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->verificationCodes->send(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testVerify(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->portingOrders->verificationCodes->verify(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            []
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
