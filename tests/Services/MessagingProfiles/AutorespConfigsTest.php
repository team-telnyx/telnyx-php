<?php

namespace Tests\Services\MessagingProfiles;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigListResponse;
use Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfigResponse;
use Tests\UnsupportedMockTests;

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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->create(
            'profile_id',
            [
                'countryCode' => 'US',
                'keywords' => ['keyword1', 'keyword2'],
                'op' => 'start',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutoRespConfigResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->create(
            'profile_id',
            [
                'countryCode' => 'US',
                'keywords' => ['keyword1', 'keyword2'],
                'op' => 'start',
                'respText' => 'Thank you for your message',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutoRespConfigResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['profileID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutoRespConfigResponse::class, $result);
    }

    #[Test]
    public function testRetrieveWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['profileID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutoRespConfigResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'profileID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                'countryCode' => 'US',
                'keywords' => ['keyword1', 'keyword2'],
                'op' => 'start',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutoRespConfigResponse::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                'profileID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
                'countryCode' => 'US',
                'keywords' => ['keyword1', 'keyword2'],
                'op' => 'start',
                'respText' => 'Thank you for your message',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutoRespConfigResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            []
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AutorespConfigListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['profileID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }

    #[Test]
    public function testDeleteWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingProfiles->autorespConfigs->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            ['profileID' => '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsString($result);
    }
}
