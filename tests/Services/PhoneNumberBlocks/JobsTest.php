<?php

namespace Tests\Services\PhoneNumberBlocks;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class JobsTest extends TestCase
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
        $result = $this->client->phoneNumberBlocks->jobs->retrieve('id');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->phoneNumberBlocks->jobs->list();

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeletePhoneNumberBlock(): void
    {
        $result = $this->client->phoneNumberBlocks->jobs->deletePhoneNumberBlock(
            'f3946371-7199-4261-9c3d-81a0d7935146'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeletePhoneNumberBlockWithOptionalParams(): void
    {
        $result = $this->client->phoneNumberBlocks->jobs->deletePhoneNumberBlock(
            'f3946371-7199-4261-9c3d-81a0d7935146'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
