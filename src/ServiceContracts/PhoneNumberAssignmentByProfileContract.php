<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse\AssignProfileToCampaignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse\SettingsDataErrorMessage;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

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
        $messagingProfileID,
        $campaignID = omit,
        $tcrCampaignID = omit,
        ?RequestOptions $requestOptions = null,
    ): AssignProfileToCampaignResponse|SettingsDataErrorMessage;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function assignRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): AssignProfileToCampaignResponse|SettingsDataErrorMessage;

    /**
     * @api
     *
     * @param int $page
     * @param int $recordsPerPage
     *
     * @return PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse<
     *   HasRawResponse
     * >
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        $page = omit,
        $recordsPerPage = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse<
     *   HasRawResponse
     * >
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatusRaw(
        string $taskID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

    /**
     * @api
     *
     * @return PhoneNumberAssignmentByProfileGetStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveStatus(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse;

    /**
     * @api
     *
     * @return PhoneNumberAssignmentByProfileGetStatusResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveStatusRaw(
        string $taskID,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberAssignmentByProfileGetStatusResponse;
}
