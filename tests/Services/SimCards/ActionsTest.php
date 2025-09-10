<?php

namespace Tests\Services\SimCards;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class ActionsTest extends TestCase
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
        $result = $this->client->simCards->actions->retrieve(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->simCards->actions->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBulkSetPublicIPs(): void
    {
        $result = $this->client->simCards->actions->bulkSetPublicIPs(
            ['6b14e151-8493-4fa1-8664-1cc4e6d14158']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testBulkSetPublicIPsWithOptionalParams(): void
    {
        $result = $this->client->simCards->actions->bulkSetPublicIPs(
            ['6b14e151-8493-4fa1-8664-1cc4e6d14158']
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDisable(): void
    {
        $result = $this->client->simCards->actions->disable(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testEnable(): void
    {
        $result = $this->client->simCards->actions->enable(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRemovePublicIP(): void
    {
        $result = $this->client->simCards->actions->removePublicIP(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetPublicIP(): void
    {
        $result = $this->client->simCards->actions->setPublicIP(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSetStandby(): void
    {
        $result = $this->client->simCards->actions->setStandby(
            '6a09cdc3-8948-47f0-aa62-74ac943d6c58'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testValidateRegistrationCodes(): void
    {
        $result = $this->client->simCards->actions->validateRegistrationCodes();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
