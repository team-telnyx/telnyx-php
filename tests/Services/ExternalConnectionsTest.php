<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\ExternalConnections\ExternalConnectionCreateParams\Outbound;
use Telnyx\ExternalConnections\ExternalConnectionUpdateParams\Outbound as Outbound1;

/**
 * @internal
 */
#[CoversNothing]
final class ExternalConnectionsTest extends TestCase
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
        $result = $this->client->externalConnections->create(
            externalSipConnection: 'zoom',
            outbound: (new Outbound)
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->externalConnections->create(
            externalSipConnection: 'zoom',
            outbound: (new Outbound)
                ->withChannelLimit(10)
                ->withOutboundVoiceProfileID('outbound_voice_profile_id'),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->externalConnections->retrieve('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->externalConnections->update(
            'id',
            outbound: Outbound1::with(
                outboundVoiceProfileID: 'outbound_voice_profile_id'
            ),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->externalConnections->update(
            'id',
            outbound: Outbound1::with(
                outboundVoiceProfileID: 'outbound_voice_profile_id'
            )
                ->withChannelLimit(10),
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->externalConnections->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->externalConnections->delete('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLocation(): void
    {
        $result = $this->client->externalConnections->updateLocation(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            id: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            staticEmergencyAddressID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateLocationWithOptionalParams(): void
    {
        $result = $this->client->externalConnections->updateLocation(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            id: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            staticEmergencyAddressID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
