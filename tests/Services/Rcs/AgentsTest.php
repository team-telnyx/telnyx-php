<?php

namespace Tests\Services\Rcs;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\Core\Util;
use Telnyx\Rcs\Agents\AgentResponse;
use Telnyx\Rcs\Agents\AgentUseCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class AgentsTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->create(
            brandID: '11111111-1111-4111-8111-111111111111',
            configuration: [
                'basics' => [
                    'email' => ['address' => 'support@example.com', 'label' => 'Support'],
                ],
            ],
            displayName: 'Acme Order Updates',
            useCase: AgentUseCase::TRANSACTIONAL,
            idempotencyKey: 'Idempotency-Key',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->create(
            brandID: '11111111-1111-4111-8111-111111111111',
            configuration: [
                'basics' => [
                    'email' => ['address' => 'support@example.com', 'label' => 'Support'],
                    'brandColor' => '#123456',
                    'description' => 'Order confirmations and delivery updates',
                    'heroURL' => 'https://www.example.com/rcs/hero.png',
                    'logoURL' => 'https://www.example.com/rcs/logo.png',
                    'phoneNumber' => ['label' => 'x', 'number' => '+49605132'],
                    'privacyPolicyURL' => 'https://www.example.com/privacy',
                    'termsAndConditionsURL' => 'https://www.example.com/terms',
                    'website' => ['label' => 'x', 'url' => 'https://example.com'],
                ],
                'campaign' => [
                    'companyOverview' => 'x',
                    'additionalInformation' => 'x',
                    'agentOverview' => 'x',
                    'consentSettings' => [
                        'callToAction' => 'x',
                        'doubleOptIn' => true,
                        'helpResponse' => 'x',
                        'optInMessage' => 'x',
                        'optInMethods' => [['methodType' => 'SMS', 'description' => 'x']],
                        'optOutResponse' => 'x',
                        'callToActionMediaURL' => 'https://example.com',
                        'callToActionURL' => 'https://example.com',
                        'doubleOptInMessage' => 'x',
                    ],
                    'interactions' => [
                        ['interactionType' => 'TRANSACTIONAL_UPDATES', 'description' => 'x'],
                    ],
                    'messageExamples' => ['x'],
                ],
                'testing' => [
                    'testURL' => 'https://example.com',
                    'additionalInformation' => 'x',
                    'messageID' => 'x',
                ],
            ],
            displayName: 'Acme Order Updates',
            useCase: AgentUseCase::TRANSACTIONAL,
            idempotencyKey: 'Idempotency-Key',
            hostingRegion: 'hosting_region',
            profileID: 'profile_id',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->list();

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testLaunch(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->launch(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            campaign: [
                'companyOverview' => 'Acme provides online retail services.',
                'agentOverview' => 'The agent sends order confirmations and delivery updates.',
                'consentSettings' => [
                    'callToAction' => 'Select RCS updates during checkout.',
                    'doubleOptIn' => false,
                    'helpResponse' => 'Contact support@example.com for help.',
                    'optInMessage' => 'You are subscribed to Acme order updates.',
                    'optInMethods' => [['methodType' => 'WEBSITE']],
                    'optOutResponse' => 'You will receive no more messages.',
                ],
                'interactions' => [['interactionType' => 'TRANSACTIONAL_UPDATES']],
                'messageExamples' => [
                    'Your Acme order is confirmed.',
                    'Your Acme order has shipped.',
                    'Your Acme order was delivered.',
                ],
            ],
            testing: ['testURL' => 'https://www.example.com/rcs/test-video'],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }

    #[Test]
    public function testLaunchWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->launch(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            campaign: [
                'companyOverview' => 'Acme provides online retail services.',
                'additionalInformation' => 'x',
                'agentOverview' => 'The agent sends order confirmations and delivery updates.',
                'consentSettings' => [
                    'callToAction' => 'Select RCS updates during checkout.',
                    'doubleOptIn' => false,
                    'helpResponse' => 'Contact support@example.com for help.',
                    'optInMessage' => 'You are subscribed to Acme order updates.',
                    'optInMethods' => [['methodType' => 'WEBSITE', 'description' => 'x']],
                    'optOutResponse' => 'You will receive no more messages.',
                    'callToActionMediaURL' => 'https://www.example.com/rcs/opt-in.png',
                    'callToActionURL' => 'https://www.example.com/checkout',
                    'doubleOptInMessage' => 'x',
                ],
                'interactions' => [
                    ['interactionType' => 'TRANSACTIONAL_UPDATES', 'description' => 'x'],
                ],
                'messageExamples' => [
                    'Your Acme order is confirmed.',
                    'Your Acme order has shipped.',
                    'Your Acme order was delivered.',
                ],
            ],
            testing: [
                'testURL' => 'https://www.example.com/rcs/test-video',
                'additionalInformation' => 'Demonstrates START, STOP, HELP, and an order-status interaction.',
                'messageID' => 'x',
            ],
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }

    #[Test]
    public function testRetrieveCarrierApprovals(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->retrieveCarrierApprovals(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertIsList($result);
    }

    #[Test]
    public function testSubmit(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Mock server tests are disabled');
        }

        $result = $this->client->rcs->agents->submit(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(AgentResponse::class, $result);
    }
}
