<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Messaging10dlc;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberAssignmentByProfileContract
{
    /**
     * @api
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
    ): PhoneNumberAssignmentByProfileAssignResponse;

    /**
     * @api
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
    ): PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;

    /**
     * @api
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
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        RequestOptions|array|null $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse;
}
