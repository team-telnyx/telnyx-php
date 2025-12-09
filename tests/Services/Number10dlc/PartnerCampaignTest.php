<?php

namespace Tests\Services\Number10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Number10dlc\PartnerCampaign\PartnerCampaignGetSharedByMeResponse;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PartnerCampaignTest extends TestCase
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
    public function testGetSharedByMe(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->partnerCampaign->getSharedByMe();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(
            PartnerCampaignGetSharedByMeResponse::class,
            $result
        );
    }

    #[Test]
    public function testGetSharingStatus(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->number10dlc->partnerCampaign->getSharingStatus(
            'campaignId'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsArray($result);
    }
}
