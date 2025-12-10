<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumbersResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse;
use Telnyx\Number10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\PhoneNumberAssignmentByProfileRawContract;

final class PhoneNumberAssignmentByProfileRawService implements PhoneNumberAssignmentByProfileRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Check the status of the task associated with assigning all phone numbers on a messaging profile to a campaign by `taskId`.
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $taskID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/phoneNumberAssignmentByProfile/%1$s', $taskID],
            options: $requestOptions,
            convert: PhoneNumberAssignmentByProfileGetResponse::class,
        );
    }

    /**
     * @api
     *
     * This endpoint allows you to link all phone numbers associated with a Messaging Profile to a campaign. **Please note:** if you want to assign phone numbers to a campaign that you did not create with Telnyx 10DLC services, this endpoint allows that provided that you've shared the campaign with Telnyx. In this case, only provide the parameter, `tcrCampaignId`, and not `campaignId`. In all other cases (where the campaign you're assigning was created with Telnyx 10DLC services), only provide `campaignId`, not `tcrCampaignId`.
     *
     * @param array{
     *   messagingProfileID: string, campaignID?: string, tcrCampaignID?: string
     * }|PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse,>
     *
     * @throws APIException
     */
    public function phoneNumberAssignmentByProfile(
        array|PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: '10dlc/phoneNumberAssignmentByProfile',
            body: (object) $parsed,
            options: $options,
            convert: PhoneNumberAssignmentByProfilePhoneNumberAssignmentByProfileResponse::class,
        );
    }

    /**
     * @api
     *
     * Check the status of the individual phone number/campaign assignments associated with the supplied `taskId`.
     *
     * @param array{
     *   page?: int, recordsPerPage?: int
     * }|PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams $params
     *
     * @return BaseResponse<PhoneNumberAssignmentByProfileGetPhoneNumbersResponse>
     *
     * @throws APIException
     */
    public function retrievePhoneNumbers(
        string $taskID,
        array|PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PhoneNumberAssignmentByProfileRetrievePhoneNumbersParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/phoneNumberAssignmentByProfile/%1$s/phoneNumbers', $taskID],
            query: $parsed,
            options: $options,
            convert: PhoneNumberAssignmentByProfileGetPhoneNumbersResponse::class,
        );
    }
}
