<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;

/**
 * @internal
 */
#[CoversNothing]
final class CampaignTest extends TestCase
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
        $result = $this->client->campaign->retrieve('campaignId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
        $result = $this->client->campaign->update('campaignId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->campaign->list(brandID: 'brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        $result = $this->client->campaign->list(brandID: 'brandId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testAcceptSharing(): void
    {
        $result = $this->client->campaign->acceptSharing('C26F1KLZN');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDeactivate(): void
    {
        $result = $this->client->campaign->deactivate('campaignId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetMnoMetadata(): void
    {
        $result = $this->client->campaign->getMnoMetadata('campaignId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetOperationStatus(): void
    {
        $result = $this->client->campaign->getOperationStatus('campaignId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetSharingStatus(): void
    {
        $result = $this->client->campaign->getSharingStatus('campaignId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSubmitAppeal(): void
    {
        $result = $this->client->campaign->submitAppeal(
            '5eb13888-32b7-4cab-95e6-d834dde21d64',
            'The website has been updated to include the required privacy policy and terms of service.',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testSubmitAppealWithOptionalParams(): void
    {
        $result = $this->client->campaign->submitAppeal(
            '5eb13888-32b7-4cab-95e6-d834dde21d64',
            'The website has been updated to include the required privacy policy and terms of service.',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
