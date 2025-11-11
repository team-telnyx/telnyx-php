<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class MobilePushCredentialsTest extends TestCase
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

        $result = $this->client->mobilePushCredentials->create([
            'alias' => 'LucyAndroidCredential',
            'certificate' => '-----BEGIN CERTIFICATE----- MIIGVDCCBTKCAQEAsNlRJVZn9ZvXcECQm65czs... -----END CERTIFICATE-----',
            'private_key' => '-----BEGIN RSA PRIVATE KEY----- MIIEpQIBAAKCAQEAsNlRJVZn9ZvXcECQm65czs... -----END RSA PRIVATE KEY-----',
            'type' => 'android',
            'project_account_json_file' => [
                'private_key' => 'bar', 'client_email' => 'bar',
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->mobilePushCredentials->create([
            'alias' => 'LucyAndroidCredential',
            'certificate' => '-----BEGIN CERTIFICATE----- MIIGVDCCBTKCAQEAsNlRJVZn9ZvXcECQm65czs... -----END CERTIFICATE-----',
            'private_key' => '-----BEGIN RSA PRIVATE KEY----- MIIEpQIBAAKCAQEAsNlRJVZn9ZvXcECQm65czs... -----END RSA PRIVATE KEY-----',
            'type' => 'android',
            'project_account_json_file' => [
                'private_key' => 'bar', 'client_email' => 'bar',
            ],
        ]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->mobilePushCredentials->retrieve(
            '0ccc7b76-4df3-4bca-a05a-3da1ecc389f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->mobilePushCredentials->list([]);

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->mobilePushCredentials->delete(
            '0ccc7b76-4df3-4bca-a05a-3da1ecc389f0'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
