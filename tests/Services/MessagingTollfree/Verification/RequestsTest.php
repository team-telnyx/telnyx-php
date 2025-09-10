<?php

namespace Tests\Services\MessagingTollfree\Verification;

use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Telnyx\Client;
use Telnyx\MessagingTollfree\Verification\Requests\TfPhoneNumber;
use Telnyx\MessagingTollfree\Verification\Requests\URL;
use Telnyx\MessagingTollfree\Verification\Requests\UseCaseCategories;
use Telnyx\MessagingTollfree\Verification\Requests\Volume;

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
            messageVolume: Volume::$VOLUME_100_000,
            optInWorkflow: "User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they've opted in a confirmation message is sent out to the handset",
            optInWorkflowImageURLs: [
                URL::with(url: 'https://telnyx.com/sign-up'),
                URL::with(url: 'https://telnyx.com/company/data-privacy'),
            ],
            phoneNumbers: [
                TfPhoneNumber::with(phoneNumber: '+18773554398'),
                TfPhoneNumber::with(phoneNumber: '+18773554399'),
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::$USE_CASE_CATEGORIES_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
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
            messageVolume: Volume::$VOLUME_100_000,
            optInWorkflow: "User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they've opted in a confirmation message is sent out to the handset",
            optInWorkflowImageURLs: [
                URL::with(url: 'https://telnyx.com/sign-up'),
                URL::with(url: 'https://telnyx.com/company/data-privacy'),
            ],
            phoneNumbers: [
                TfPhoneNumber::with(phoneNumber: '+18773554398'),
                TfPhoneNumber::with(phoneNumber: '+18773554399'),
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::$USE_CASE_CATEGORIES_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        $result = $this
            ->client
            ->messagingTollfree
            ->verification
            ->requests
            ->retrieve('182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e')
        ;

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdate(): void
    {
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
            messageVolume: Volume::$VOLUME_100_000,
            optInWorkflow: "User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they've opted in a confirmation message is sent out to the handset",
            optInWorkflowImageURLs: [
                URL::with(url: 'https://telnyx.com/sign-up'),
                URL::with(url: 'https://telnyx.com/company/data-privacy'),
            ],
            phoneNumbers: [
                TfPhoneNumber::with(phoneNumber: '+18773554398'),
                TfPhoneNumber::with(phoneNumber: '+18773554399'),
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::$USE_CASE_CATEGORIES_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testUpdateWithOptionalParams(): void
    {
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
            messageVolume: Volume::$VOLUME_100_000,
            optInWorkflow: "User signs into the Telnyx portal, enters a number and is prompted to select whether they want to use 2FA verification for security purposes. If they've opted in a confirmation message is sent out to the handset",
            optInWorkflowImageURLs: [
                URL::with(url: 'https://telnyx.com/sign-up'),
                URL::with(url: 'https://telnyx.com/company/data-privacy'),
            ],
            phoneNumbers: [
                TfPhoneNumber::with(phoneNumber: '+18773554398'),
                TfPhoneNumber::with(phoneNumber: '+18773554399'),
            ],
            productionMessageContent: 'Your Telnyx OTP is XXXX',
            useCase: UseCaseCategories::$USE_CASE_CATEGORIES_2_FA,
            useCaseSummary: 'This is a use case where Telnyx sends out 2FA codes to portal users to verify their identity in order to sign into the portal',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        $result = $this->client->messagingTollfree->verification->requests->list(
            page: 1,
            pageSize: 1
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        $result = $this->client->messagingTollfree->verification->requests->list(
            page: 1,
            pageSize: 1
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testDelete(): void
    {
        $result = $this->client->messagingTollfree->verification->requests->delete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
