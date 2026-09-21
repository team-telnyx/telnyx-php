<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\BotSignup\SuccessResponse;
use Telnyx\Client;
use Telnyx\Core\Util;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class BotSignupTest extends TestCase
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

        $result = $this->client->botSignup->create(
            botChallengeAnswer: '35',
            botChallengeNonce: 'c6feda4e-6501-4db9-a21f-665e5b4ce2ba',
            privacyPolicyURL: 'https://telnyx.com/privacy-policy',
            termsAndConditionsURL: 'https://telnyx.com/terms-and-conditions-of-service',
            termsOfService: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SuccessResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->botSignup->create(
            botChallengeAnswer: '35',
            botChallengeNonce: 'c6feda4e-6501-4db9-a21f-665e5b4ce2ba',
            privacyPolicyURL: 'https://telnyx.com/privacy-policy',
            termsAndConditionsURL: 'https://telnyx.com/terms-and-conditions-of-service',
            termsOfService: true,
            email: 'agent-owner@example.com',
            termsAndConditionsEuURL: 'https://telnyx.com/terms-and-conditions-of-service-eu',
            termsOfServiceEu: true,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SuccessResponse::class, $result);
    }

    #[Test]
    public function testResendMagicLink(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->botSignup->resendMagicLink(
            email: 'agent-owner@example.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SuccessResponse::class, $result);
    }

    #[Test]
    public function testResendMagicLinkWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->botSignup->resendMagicLink(
            email: 'agent-owner@example.com'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(SuccessResponse::class, $result);
    }
}
