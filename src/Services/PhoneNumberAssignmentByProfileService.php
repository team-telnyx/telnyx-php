<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignParams;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileAssignResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PhoneNumberAssignmentByProfileContract;

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
     * @param array{
     *   messagingProfileId: string, campaignId?: string, tcrCampaignId?: string
     * }|PhoneNumberAssignmentByProfileAssignParams $params
     *
     * @throws APIException
     */
    public function assign(
        array|PhoneNumberAssignmentByProfileAssignParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileAssignResponse {
        [$parsed, $options] = PhoneNumberAssignmentByProfileAssignParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberAssignmentByProfileAssignResponse> */
        $response = $this->client->request(
            method: 'post',
            path: '10dlc/phoneNumberAssignmentByProfile',
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberAssignmentByProfileAssignResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @param array{
     *   page?: int, recordsPerPage?: int
     * }|PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams $params
     *
     * @throws APIException
     */
    public function retrievePhoneNumberStatus(
        string $taskID,
        array|PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams $params,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse {
        [$parsed, $options] = PhoneNumberAssignmentByProfileRetrievePhoneNumberStatusParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse,> */
        $response = $this->client->request(
            method: 'get',
            path: ['10dlc/phoneNumberAssignmentByProfile/%1$s/phoneNumbers', $taskID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse::class,
        );

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
        /** @var BaseResponse<PhoneNumberAssignmentByProfileGetStatusResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['10dlc/phoneNumberAssignmentByProfile/%1$s', $taskID],
            options: $requestOptions,
            convert: PhoneNumberAssignmentByProfileGetStatusResponse::class,
        );

        return $response->parse();
    }
}
