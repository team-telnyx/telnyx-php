<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberAssignmentByProfileContract;

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
     *
     * @throws APIException
     */
    public function assign(
        string $messagingProfileID,
        ?string $campaignID = null,
        ?string $tcrCampaignID = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileAssignResponse {
        $params = [
            'messagingProfileID' => $messagingProfileID,
            'campaignID' => $campaignID,
            'tcrCampaignID' => $tcrCampaignID,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->assign(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @throws APIException
     */
    public function listPhoneNumberStatus(
        string $taskID,
        int $page = 1,
        int $recordsPerPage = 20,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse {
        $params = ['page' => $page, 'recordsPerPage' => $recordsPerPage];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listPhoneNumberStatus($taskID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        int $page = 1,
        int $recordsPerPage = 20,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse {
        $params = ['page' => $page, 'recordsPerPage' => $recordsPerPage];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrievePhoneNumberStatus($taskID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the task associated with assigning all phone numbers on a messaging profile to a campaign by `taskId`.
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStatus($taskID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
