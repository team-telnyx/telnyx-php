<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Brand\EntityType;
use Telnyx\Brand\Vertical;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class BrandTest extends TestCase
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
        $result = $this->client->brand->create(
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::$PRIVATE_PROFIT,
            vertical: Vertical::$TECHNOLOGY,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        $result = $this->client->brand->create(
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::$PRIVATE_PROFIT,
            vertical: Vertical::$TECHNOLOGY,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this->client->brand->retrieve('brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->brand->update(
            'brandId',
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::$PRIVATE_PROFIT,
            vertical: Vertical::$TECHNOLOGY,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        $result = $this->client->brand->update(
            'brandId',
            country: 'US',
            displayName: 'ABC Mobile',
            email: 'email',
            entityType: EntityType::$PRIVATE_PROFIT,
            vertical: Vertical::$TECHNOLOGY,
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->brand->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->brand->delete('brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetFeedback(): void
    {
        $result = $this->client->brand->getFeedback('brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testResend2faEmail(): void
    {
        $result = $this->client->brand->resend2faEmail('brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRevet(): void
    {
        $result = $this->client->brand->revet('brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
