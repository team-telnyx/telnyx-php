<?php

namespace Tests\Services\MessagingProfiles;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class AutorespConfigsTest extends TestCase
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
        $result = $this->client->messagingProfiles->autorespConfigs->create(
            'profile_id',
            countryCode: 'US',
            keywords: ['keyword1', 'keyword2'],
            op: 'start',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->create(
            'profile_id',
            countryCode: 'US',
            keywords: ['keyword1', 'keyword2'],
            op: 'start',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            profileID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            countryCode: 'US',
            keywords: ['keyword1', 'keyword2'],
            op: 'start',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            profileID: '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            countryCode: 'US',
            keywords: ['keyword1', 'keyword2'],
            op: 'start',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        $result = $this->client->messagingProfiles->autorespConfigs->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
