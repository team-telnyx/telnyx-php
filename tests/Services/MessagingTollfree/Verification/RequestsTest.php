<?php

namespace Tests\Services\MessagingTollfree\Verification;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\MessagingTollfree\Verification\Requests\RequestListResponse;
use Telnyx\MessagingTollfree\Verification\Requests\TfVerificationStatus;
use Telnyx\MessagingTollfree\Verification\Requests\TollFreeVerificationEntityType;
use Telnyx\MessagingTollfree\Verification\Requests\UseCaseCategories;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestEgress;
use Telnyx\MessagingTollfree\Verification\Requests\VerificationRequestStatus;
use Telnyx\MessagingTollfree\Verification\Requests\Volume;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class RequestsTest extends TestCase
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

        $result = $this->client->messagingTollfree->verification->requests->create(
            additionalInformation: 'additionalInformation',
            businessAddr1: '600 Congress Avenue',
            businessCity: 'Austin',
            businessContactEmail: 'email@example.com',
            businessContactFirstName: 'John',
            businessContactLastName: 'Doe',
            businessContactPhone: '+18005550100',
            businessName: 'Telnyx LLC',
            businessState: 'Texas',
            businessZip: '78701',
            corporateWebsite: 'http://example.com',
            isvReseller: 'isvReseller',
            messageVolume: Volume::_100_000,
            optInWorkflow: 'User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they\'ve opted in a confirmation message is sent out to the handset',
            optInWorkflowImageURLs: [
                ['url' => 'https://telnyx.com/sign-up'],
                ['url' => 'https://telnyx.com/company/data-privacy'],
            ],
            phoneNumbers: [
                ['phoneNumber' => '+18773554398'], ['phoneNumber' => '+18773554399'],
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationRequestEgress::class, $result);
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingTollfree->verification->requests->create(
            additionalInformation: 'additionalInformation',
            businessAddr1: '600 Congress Avenue',
            businessCity: 'Austin',
            businessContactEmail: 'email@example.com',
            businessContactFirstName: 'John',
            businessContactLastName: 'Doe',
            businessContactPhone: '+18005550100',
            businessName: 'Telnyx LLC',
            businessState: 'Texas',
            businessZip: '78701',
            corporateWebsite: 'http://example.com',
            isvReseller: 'isvReseller',
            messageVolume: Volume::_100_000,
            optInWorkflow: 'User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they\'ve opted in a confirmation message is sent out to the handset',
            optInWorkflowImageURLs: [
                ['url' => 'https://telnyx.com/sign-up'],
                ['url' => 'https://telnyx.com/company/data-privacy'],
            ],
            phoneNumbers: [
                ['phoneNumber' => '+18773554398'], ['phoneNumber' => '+18773554399'],
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
            ageGatedContent: true,
            businessAddr2: '14th Floor',
            businessRegistrationCountry: 'US',
            businessRegistrationNumber: '12-3456789',
            businessRegistrationType: 'EIN',
            doingBusinessAs: 'Acme Services',
            entityType: TollFreeVerificationEntityType::SOLE_PROPRIETOR,
            helpMessageResponse: 'Reply HELP for assistance or STOP to unsubscribe. Contact: support@example.com',
            optInConfirmationResponse: 'You have successfully opted in to receive messages from Acme Corp',
            optInKeywords: 'START, YES, SUBSCRIBE',
            privacyPolicyURL: 'https://example.com/privacy',
            termsAndConditionURL: 'https://example.com/terms',
            webhookURL: 'http://example-webhook.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationRequestEgress::class, $result);
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this
            ->client
            ->messagingTollfree
            ->verification
            ->requests
            ->retrieve('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationRequestStatus::class, $result);
    }

    #[Test]
    public function testUpdate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingTollfree->verification->requests->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            additionalInformation: 'additionalInformation',
            businessAddr1: '600 Congress Avenue',
            businessCity: 'Austin',
            businessContactEmail: 'email@example.com',
            businessContactFirstName: 'John',
            businessContactLastName: 'Doe',
            businessContactPhone: '+18005550100',
            businessName: 'Telnyx LLC',
            businessState: 'Texas',
            businessZip: '78701',
            corporateWebsite: 'http://example.com',
            isvReseller: 'isvReseller',
            messageVolume: Volume::_100_000,
            optInWorkflow: 'User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they\'ve opted in a confirmation message is sent out to the handset',
            optInWorkflowImageURLs: [
                ['url' => 'https://telnyx.com/sign-up'],
                ['url' => 'https://telnyx.com/company/data-privacy'],
            ],
            phoneNumbers: [
                ['phoneNumber' => '+18773554398'], ['phoneNumber' => '+18773554399'],
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationRequestEgress::class, $result);
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingTollfree->verification->requests->update(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            additionalInformation: 'additionalInformation',
            businessAddr1: '600 Congress Avenue',
            businessCity: 'Austin',
            businessContactEmail: 'email@example.com',
            businessContactFirstName: 'John',
            businessContactLastName: 'Doe',
            businessContactPhone: '+18005550100',
            businessName: 'Telnyx LLC',
            businessState: 'Texas',
            businessZip: '78701',
            corporateWebsite: 'http://example.com',
            isvReseller: 'isvReseller',
            messageVolume: Volume::_100_000,
            optInWorkflow: 'User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they\'ve opted in a confirmation message is sent out to the handset',
            optInWorkflowImageURLs: [
                ['url' => 'https://telnyx.com/sign-up'],
                ['url' => 'https://telnyx.com/company/data-privacy'],
            ],
            phoneNumbers: [
                ['phoneNumber' => '+18773554398'], ['phoneNumber' => '+18773554399'],
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
            ageGatedContent: true,
            businessAddr2: '14th Floor',
            businessRegistrationCountry: 'US',
            businessRegistrationNumber: '12-3456789',
            businessRegistrationType: 'EIN',
            doingBusinessAs: 'Acme Services',
            entityType: TollFreeVerificationEntityType::SOLE_PROPRIETOR,
            helpMessageResponse: 'Reply HELP for assistance or STOP to unsubscribe. Contact: support@example.com',
            optInConfirmationResponse: 'You have successfully opted in to receive messages from Acme Corp',
            optInKeywords: 'START, YES, SUBSCRIBE',
            privacyPolicyURL: 'https://example.com/privacy',
            termsAndConditionURL: 'https://example.com/terms',
            webhookURL: 'http://example-webhook.com',
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(VerificationRequestEgress::class, $result);
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingTollfree->verification->requests->list(
            page: 1,
            pageSize: 1
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RequestListResponse::class, $result);
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingTollfree->verification->requests->list(
            page: 1,
            pageSize: 1,
            dateEnd: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            dateStart: new \DateTimeImmutable('2019-12-27T18:11:19.117Z'),
            phoneNumber: 'phone_number',
            status: TfVerificationStatus::VERIFIED,
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertInstanceOf(RequestListResponse::class, $result);
    }

    #[Test]
    public function testDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->messagingTollfree->verification->requests->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        // @phpstan-ignore-next-line method.alreadyNarrowedType
        $this->assertNull($result);
    }
}
