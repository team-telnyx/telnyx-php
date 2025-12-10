<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingProfiles\MessagingProfile;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileDeleteResponse;
use Telnyx\MessagingProfiles\MessagingProfileGetResponse;
use Telnyx\MessagingProfiles\MessagingProfileListParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesParams;
use Telnyx\MessagingProfiles\MessagingProfileNewResponse;
use Telnyx\MessagingProfiles\MessagingProfileUpdateParams;
use Telnyx\MessagingProfiles\MessagingProfileUpdateResponse;
use Telnyx\PhoneNumberWithMessagingSettings;
use Telnyx\RequestOptions;
use Telnyx\ShortCode;

interface MessagingProfilesRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileCreateParams $params
     *
     * @return BaseResponse<MessagingProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     *
     * @return BaseResponse<MessagingProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array<mixed>|MessagingProfileUpdateParams $params
     *
     * @return BaseResponse<MessagingProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $messagingProfileID,
        array|MessagingProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListParams $params
     *
     * @return BaseResponse<DefaultPagination<MessagingProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     *
     * @return BaseResponse<MessagingProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array<mixed>|MessagingProfileListPhoneNumbersParams $params
     *
     * @return BaseResponse<DefaultPagination<PhoneNumberWithMessagingSettings>>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $messagingProfileID,
        array|MessagingProfileListPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID The id of the messaging profile to retrieve
     * @param array<mixed>|MessagingProfileListShortCodesParams $params
     *
     * @return BaseResponse<DefaultPagination<ShortCode>>
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $messagingProfileID,
        array|MessagingProfileListShortCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
