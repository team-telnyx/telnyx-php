<?php

namespace Tests\Services\Verifications\ByPhoneNumber;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Verifications\ByPhoneNumber\Actions\VerifyVerificationCodeResponse;
use Tests\UnsupportedMockTests;

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
    public function testVerify(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->byPhoneNumber->actions->verify(
            '+13035551234',
            [
                'code' => '17686',
                'verify_profile_id' => '12ade33a-21c0-473b-b055-b3c836e1c292',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyVerificationCodeResponse::class, $result);
    }

    #[Test]
    public function testVerifyWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->verifications->byPhoneNumber->actions->verify(
            '+13035551234',
            [
                'code' => '17686',
                'verify_profile_id' => '12ade33a-21c0-473b-b055-b3c836e1c292',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyVerificationCodeResponse::class, $result);
    }
}
