<?php

namespace Tests\Services;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Campaign\CampaignDeactivateResponse;
use Telnyx\Campaign\CampaignGetMnoMetadataResponse;
use Telnyx\Campaign\CampaignGetSharingStatusResponse;
use Telnyx\Campaign\CampaignListResponse;
use Telnyx\Campaign\CampaignSubmitAppealResponse;
use Telnyx\Campaign\TelnyxCampaignCsp;
use Telnyx\Client;
use Tests\UnsupportedMockTests;

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
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->retrieve('campaignId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxCampaignCsp::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->update('campaignId', []);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxCampaignCsp::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->list(['brandID' => 'brandId']);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->list([
            'brandID' => 'brandId',
            'page' => 0,
            'recordsPerPage' => 0,
            'sort' => 'assignedPhoneNumbersCount',
        ]);

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignListResponse::class, $result);
    }

    #[Test]
    public function testAcceptSharing(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->acceptSharing('C26F1KLZN');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }

    #[Test]
    public function testDeactivate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->deactivate('campaignId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignDeactivateResponse::class, $result);
    }

    #[Test]
    public function testGetMnoMetadata(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->getMnoMetadata('campaignId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignGetMnoMetadataResponse::class, $result);
    }

    #[Test]
    public function testGetOperationStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->getOperationStatus('campaignId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }

    #[Test]
    public function testGetSharingStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->getSharingStatus('campaignId');

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignGetSharingStatusResponse::class, $result);
    }

    #[Test]
    public function testSubmitAppeal(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->submitAppeal(
            '5eb13888-32b7-4cab-95e6-d834dde21d64',
            [
                'appealReason' => 'The website has been updated to include the required privacy policy and terms of service.',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignSubmitAppealResponse::class, $result);
    }

    #[Test]
    public function testSubmitAppealWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->campaign->submitAppeal(
            '5eb13888-32b7-4cab-95e6-d834dde21d64',
            [
                'appealReason' => 'The website has been updated to include the required privacy policy and terms of service.',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(CampaignSubmitAppealResponse::class, $result);
    }
}
