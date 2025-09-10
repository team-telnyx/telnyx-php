<?php

namespace Tests\Services\VerifiedNumbers;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
    public function testSubmitVerificationCode(): void
    {
        $result = $this->client->verifiedNumbers->actions->submitVerificationCode(
            '+15551234567',
            '123456'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSubmitVerificationCodeWithOptionalParams(): void
    {
        $result = $this->client->verifiedNumbers->actions->submitVerificationCode(
            '+15551234567',
            '123456'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
