<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\AlphanumericSenderIDs\AlphanumericSenderID;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingProfiles\MessagingProfile;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileDeleteResponse;
use Telnyx\MessagingProfiles\MessagingProfileGetMetricsResponse;
use Telnyx\MessagingProfiles\MessagingProfileGetResponse;
use Telnyx\MessagingProfiles\MessagingProfileListAlphanumericSenderIDsParams;
use Telnyx\MessagingProfiles\MessagingProfileListParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesParams;
use Telnyx\MessagingProfiles\MessagingProfileNewResponse;
use Telnyx\MessagingProfiles\MessagingProfileRetrieveMetricsParams;
use Telnyx\MessagingProfiles\MessagingProfileUpdateParams;
use Telnyx\MessagingProfiles\MessagingProfileUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ShortCode;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingProfilesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingProfileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingProfileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $messagingProfileID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array<string,mixed>|MessagingProfileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $messagingProfileID,
        array|MessagingProfileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MessagingProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessagingProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $messagingProfileID,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the identifier of the messaging profile
     * @param array<string,mixed>|MessagingProfileListAlphanumericSenderIDsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AlphanumericSenderID>>
     *
     * @throws APIException
     */
    public function listAlphanumericSenderIDs(
        string $id,
        array|MessagingProfileListAlphanumericSenderIDsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array<string,mixed>|MessagingProfileListPhoneNumbersParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $messagingProfileID,
        array|MessagingProfileListPhoneNumbersParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array<string,mixed>|MessagingProfileListShortCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ShortCode>>
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $messagingProfileID,
        array|MessagingProfileListShortCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the identifier of the messaging profile
     * @param array<string,mixed>|MessagingProfileRetrieveMetricsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingProfileGetMetricsResponse>
     *
     * @throws APIException
     */
    public function retrieveMetrics(
        string $id,
        array|MessagingProfileRetrieveMetricsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
