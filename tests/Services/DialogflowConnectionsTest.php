<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\DialogflowConnections\DialogflowConnectionGetResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionNewResponse;
use Telnyx\DialogflowConnections\DialogflowConnectionUpdateResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DialogflowConnectionsTest extends TestCase
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

        $result = $this->client->dialogflowConnections->create(
            'connection_id',
            serviceAccount: [
                'type' => 'bar',
                'project_id' => 'bar',
                'private_key_id' => 'bar',
                'private_key' => 'bar',
                'client_email' => 'bar',
                'client_id' => 'bar',
                'auth_uri' => 'bar',
                'token_uri' => 'bar',
                'auth_provider_x509_cert_url' => 'bar',
                'client_x509_cert_url' => 'bar',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DialogflowConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dialogflowConnections->create(
            'connection_id',
            serviceAccount: [
                'type' => 'bar',
                'project_id' => 'bar',
                'private_key_id' => 'bar',
                'private_key' => 'bar',
                'client_email' => 'bar',
                'client_id' => 'bar',
                'auth_uri' => 'bar',
                'token_uri' => 'bar',
                'auth_provider_x509_cert_url' => 'bar',
                'client_x509_cert_url' => 'bar',
            ],
            conversationProfileID: 'a-VMHLWzTmKjiJw5S6O0-w',
            dialogflowAPI: 'cx',
            environment: 'development',
            location: 'global',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DialogflowConnectionNewResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dialogflowConnections->retrieve('connection_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DialogflowConnectionGetResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dialogflowConnections->update(
            'connection_id',
            serviceAccount: [
                'type' => 'bar',
                'project_id' => 'bar',
                'private_key_id' => 'bar',
                'private_key' => 'bar',
                'client_email' => 'bar',
                'client_id' => 'bar',
                'auth_uri' => 'bar',
                'token_uri' => 'bar',
                'auth_provider_x509_cert_url' => 'bar',
                'client_x509_cert_url' => 'bar',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DialogflowConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dialogflowConnections->update(
            'connection_id',
            serviceAccount: [
                'type' => 'bar',
                'project_id' => 'bar',
                'private_key_id' => 'bar',
                'private_key' => 'bar',
                'client_email' => 'bar',
                'client_id' => 'bar',
                'auth_uri' => 'bar',
                'token_uri' => 'bar',
                'auth_provider_x509_cert_url' => 'bar',
                'client_x509_cert_url' => 'bar',
            ],
            conversationProfileID: 'a-VMHLWzTmKjiJw5S6O0-w',
            dialogflowAPI: 'cx',
            environment: 'development',
            location: 'global',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(DialogflowConnectionUpdateResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->dialogflowConnections->delete('connection_id');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
