<?php

namespace Tests\Services\Client;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
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

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->retrieve('consent_token')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGrants(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->grants(allowed: true, consentToken: 'consent_token')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGrantsWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->grants(allowed: true, consentToken: 'consent_token')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testIntrospect(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->introspect('token')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testIntrospectWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->introspect('token')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRegister(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->register()
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveAuthorize(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't properly handle redirects");
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->retrieveAuthorize(
                clientID: 'client_id',
                redirectUri: 'https://example.com',
                responseType: 'code',
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveAuthorizeWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't properly handle redirects");
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->retrieveAuthorize(
                clientID: 'client_id',
                redirectUri: 'https://example.com',
                responseType: 'code',
            )
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveJwks(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->retrieveJwks()
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testToken(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->token(grantType: 'client_credentials')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testTokenWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->STAINLESS_FIXME_client
            ->STAINLESS_FIXME_oauth
            ->token(grantType: 'client_credentials');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
