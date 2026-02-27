<?php

declare(strict_types=1);

namespace Telnyx\Services\Messaging10dlc;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlc\PhoneNumberAssignmentByProfileContract;

/**
 * Phone number campaign bulk assignment.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PhoneNumberAssignmentByProfileService implements PhoneNumberAssignmentByProfileContract
{
    /**
     * @api
     */
    public PhoneNumberAssignmentByProfileRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PhoneNumberAssignmentByProfileRawService($client);
    }

    /**
     * @api
     *
     * This endpoint allows you to link all phone numbers associated with a Messaging Profile to a campaign. **Please note:** if you want to assign phone numbers to a campaign that you did not create with Telnyx 10DLC services, this endpoint allows that provided that you've shared the campaign with Telnyx. In this case, only provide the parameter, `tcrCampaignId`, and not `campaignId`. In all other cases (where the campaign you're assigning was created with Telnyx 10DLC services), only provide `campaignId`, not `tcrCampaignId`.
     *
     * @param string $messagingProfileID the ID of the messaging profile that you want to link to the specified campaign
     * @param string $campaignID The ID of the campaign you want to link to the specified messaging profile. If you supply this ID in the request, do not also include a tcrCampaignId.
     * @param string $tcrCampaignID The TCR ID of the shared campaign you want to link to the specified messaging profile (for campaigns not created using Telnyx 10DLC services only). If you supply this ID in the request, do not also include a campaignId.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function assign(
        string $messagingProfileID,
        ?string $campaignID = null,
        ?string $tcrCampaignID = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberAssignmentByProfileAssignResponse {
        $params = Util::removeNulls(
            [
                'messagingProfileID' => $messagingProfileID,
                'campaignID' => $campaignID,
                'tcrCampaignID' => $tcrCampaignID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->assign(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listPhoneNumberStatus(
        string $taskID,
        int $page = 1,
        int $recordsPerPage = 20,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse {
        $params = Util::removeNulls(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPhoneNumberStatus($taskID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        int $page = 1,
        int $recordsPerPage = 20,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse {
        $params = Util::removeNulls(
            ['page' => $page, 'recordsPerPage' => $recordsPerPage]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrievePhoneNumberStatus($taskID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the task associated with assigning all phone numbers on a messaging profile to a campaign by `taskId`.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
