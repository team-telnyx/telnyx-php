<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignParams;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse\AssignProfileToCampaignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse\SettingsDataErrorMessage;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberAssignmentByProfileContract;

use const Telnyx\Core\OMIT as omit;

final class PhoneNumberAssignmentByProfileService implements PhoneNumberAssignmentByProfileContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * This endpoint allows you to link all phone numbers associated with a Messaging Profile to a campaign. **Please note:** if you want to assign phone numbers to a campaign that you did not create with Telnyx 10DLC services, this endpoint allows that provided that you've shared the campaign with Telnyx. In this case, only provide the parameter, `tcrCampaignId`, and not `campaignId`. In all other cases (where the campaign you're assigning was created with Telnyx 10DLC services), only provide `campaignId`, not `tcrCampaignId`.
     *
     * @param string $messagingProfileID the ID of the messaging profile that you want to link to the specified campaign
     * @param string $campaignID The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     * @param string $tcrCampaignID The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     */
    public function assign(
        $messagingProfileID,
        $campaignID = omit,
        $tcrCampaignID = omit,
        ?RequestOptions $requestOptions = null,
    ): AssignProfileToCampaignResponse|SettingsDataErrorMessage {
        [
            $parsed, $options,
        ] = PhoneNumberAssignmentByProfileAssignParams::parseRequest(
            [
                'messagingProfileID' => $messagingProfileID,
                'campaignID' => $campaignID,
                'tcrCampaignID' => $tcrCampaignID,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'phoneNumberAssignmentByProfile',
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberAssignmentByProfileAssignResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @param int $page
     * @param int $recordsPerPage
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        $page = omit,
        $recordsPerPage = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse {
        [
            $parsed, $options,
        ] = PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams::parseRequest(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phoneNumberAssignmentByProfile/%1$s/phoneNumbers', $taskID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the status of the task associated with assigning all phone numbers on a messaging profile to a campaign by `taskId`.
     */
    public function retrieveStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['phoneNumberAssignmentByProfile/%1$s', $taskID],
            options: $requestOptions,
            convert: PhoneNumberAssignmentByProfileGetStatusResponse::class,
        );
    }
}
