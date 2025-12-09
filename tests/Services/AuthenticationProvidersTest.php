<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\Client;
use Telnyx\DefaultFlatPagination;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AuthenticationProvidersTest extends TestCase
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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->authenticationProviders->create(
            name: 'Okta',
            settings: [
                'idpCertFingerprint' => '13:38:C7:BB:C9:FF:4A:70:38:3A:E3:D9:5C:CD:DB:2E:50:1E:80:A7',
                'idpEntityID' => 'https://myorg.myidp.com/saml/metadata',
                'idpSSOTargetURL' => 'https://myorg.myidp.com/trust/saml2/http-post/sso',
            ],
            shortName: 'myorg',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticationProviderNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->authenticationProviders->create(
            name: 'Okta',
            settings: [
                'idpCertFingerprint' => '13:38:C7:BB:C9:FF:4A:70:38:3A:E3:D9:5C:CD:DB:2E:50:1E:80:A7',
                'idpEntityID' => 'https://myorg.myidp.com/saml/metadata',
                'idpSSOTargetURL' => 'https://myorg.myidp.com/trust/saml2/http-post/sso',
                'idpCertFingerprintAlgorithm' => 'sha256',
            ],
            shortName: 'myorg',
            active: true,
            settingsURL: 'https://myorg.myidp.com/saml/metadata',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticationProviderNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->authenticationProviders->retrieve('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AuthenticationProviderGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->authenticationProviders->update('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AuthenticationProviderUpdateResponse::class,
            $result
        );
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->authenticationProviders->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DefaultFlatPagination::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->authenticationProviders->delete('id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            AuthenticationProviderDeleteResponse::class,
            $result
        );
    }
}
