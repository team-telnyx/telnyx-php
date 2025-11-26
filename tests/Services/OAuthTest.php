<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\OAuth\OAuthGetJwksResponse;
use Telnyx\OAuth\OAuthGetResponse;
use Telnyx\OAuth\OAuthGrantsResponse;
use Telnyx\OAuth\OAuthIntrospectResponse;
use Telnyx\OAuth\OAuthRegisterResponse;
use Telnyx\OAuth\OAuthTokenResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class OAuthTest extends TestCase
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

        $result = $this->client->oauth->retrieve('consent_token');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthGetResponse::class, $result);
    }

    #[Test]
    public function testGrants(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->grants([
            'allowed' => true, 'consent_token' => 'consent_token',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthGrantsResponse::class, $result);
    }

    #[Test]
    public function testGrantsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->grants([
            'allowed' => true, 'consent_token' => 'consent_token',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthGrantsResponse::class, $result);
    }

    #[Test]
    public function testIntrospect(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->introspect(['token' => 'token']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthIntrospectResponse::class, $result);
    }

    #[Test]
    public function testIntrospectWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->introspect(['token' => 'token']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthIntrospectResponse::class, $result);
    }

    #[Test]
    public function testRegister(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->register([]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthRegisterResponse::class, $result);
    }

    #[Test]
    public function testRetrieveAuthorize(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->retrieveAuthorize([
            'client_id' => 'client_id',
            'redirect_uri' => 'https://example.com',
            'response_type' => 'code',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveAuthorizeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->retrieveAuthorize([
            'client_id' => 'client_id',
            'redirect_uri' => 'https://example.com',
            'response_type' => 'code',
            'code_challenge' => 'code_challenge',
            'code_challenge_method' => 'plain',
            'scope' => 'scope',
            'state' => 'state',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }

    #[Test]
    public function testRetrieveJwks(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->retrieveJwks();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthGetJwksResponse::class, $result);
    }

    #[Test]
    public function testToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->token([
            'grant_type' => 'client_credentials',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthTokenResponse::class, $result);
    }

    #[Test]
    public function testTokenWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->oauth->token([
            'grant_type' => 'client_credentials',
            'client_id' => 'client_id',
            'client_secret' => 'client_secret',
            'code' => 'code',
            'code_verifier' => 'code_verifier',
            'redirect_uri' => 'https://example.com',
            'refresh_token' => 'refresh_token',
            'scope' => 'admin',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(OAuthTokenResponse::class, $result);
    }
}
