<?php

namespace Tests\Services\Addresses;

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
    public function testAcceptSuggestions(): void
    {
        $result = $this->client->addresses->actions->acceptSuggestions(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testValidate(): void
    {
        $result = $this->client->addresses->actions->validate(
            countryCode: 'US',
            postalCode: '78701',
            streetAddress: '600 Congress Avenue',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testValidateWithOptionalParams(): void
    {
        $result = $this->client->addresses->actions->validate(
            countryCode: 'US',
            postalCode: '78701',
            streetAddress: '600 Congress Avenue',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
