<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;
use Telnyx\RequestOptions;

interface PhoneNumberAssignmentByProfileContract
{
    /**
     * @api
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
    ): PhoneNumberAssignmentByProfileAssignResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function listPhoneNumberStatus(
        string $taskID,
        int $page = 1,
        int $recordsPerPage = 20,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileListPhoneNumberStatusResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        int $page = 1,
        int $recordsPerPage = 20,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse;
}
