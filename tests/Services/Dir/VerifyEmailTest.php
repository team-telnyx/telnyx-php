<?php

namespace Tests\Services\Dir;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Dir\VerifyEmail\VerifyEmailConfirmResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendResponse;
use Telnyx\Dir\VerifyEmail\VerifyEmailStatusResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class VerifyEmailTest extends TestCase
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
    public function testConfirm(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->verifyEmail->confirm(
            '16635d38-75a6-4481-82e8-69af60e05011',
            code: '482915'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyEmailConfirmResponse::class, $result);
    }

    #[Test]
    public function testConfirmWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->verifyEmail->confirm(
            '16635d38-75a6-4481-82e8-69af60e05011',
            code: '482915'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyEmailConfirmResponse::class, $result);
    }

    #[Test]
    public function testSend(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->verifyEmail->send(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyEmailSendResponse::class, $result);
    }

    #[Test]
    public function testStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dir->verifyEmail->status(
            '16635d38-75a6-4481-82e8-69af60e05011'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerifyEmailStatusResponse::class, $result);
    }
}
