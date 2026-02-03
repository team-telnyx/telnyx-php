<?php

namespace Tests\Services\Messaging10dlc;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\Campaign\TelnyxCampaignCsp;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class CampaignBuilderTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = Util::getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testSubmit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messaging10dlc->campaignBuilder->submit(
            brandID: 'brandId',
            description: 'description',
            usecase: 'usecase'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxCampaignCsp::class, $result);
    }

    #[Test]
    public function testSubmitWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messaging10dlc->campaignBuilder->submit(
            brandID: 'brandId',
            description: 'description',
            usecase: 'usecase',
            ageGated: true,
            autoRenewal: true,
            directLending: true,
            embeddedLink: true,
            embeddedLinkSample: 'embeddedLinkSample',
            embeddedPhone: true,
            helpKeywords: 'helpKeywords',
            helpMessage: 'helpMessage',
            messageFlow: 'messageFlow',
            mnoIDs: [0],
            numberPool: true,
            optinKeywords: 'optinKeywords',
            optinMessage: 'optinMessage',
            optoutKeywords: 'optoutKeywords',
            optoutMessage: 'optoutMessage',
            privacyPolicyLink: 'privacyPolicyLink',
            referenceID: 'referenceId',
            resellerID: 'resellerId',
            sample1: 'sample1',
            sample2: 'sample2',
            sample3: 'sample3',
            sample4: 'sample4',
            sample5: 'sample5',
            subscriberHelp: true,
            subscriberOptin: true,
            subscriberOptout: true,
            subUsecases: ['string'],
            tag: ['string'],
            termsAndConditions: true,
            termsAndConditionsLink: 'termsAndConditionsLink',
            webhookFailoverURL: 'https://webhook.com/93711262-23e5-4048-a966-c0b2a16d5963',
            webhookURL: 'https://webhook.com/67ea78a8-9f32-4d04-b62d-f9502e8e5f93',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(TelnyxCampaignCsp::class, $result);
    }
}
