<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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

interface MessagingProfilesContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $messagingProfileID,
        array|MessagingProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListParams $params
     *
     * @return DefaultPagination<MessagingProfile>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListPhoneNumbersParams $params
     *
     * @return DefaultPagination<PhoneNumberWithMessagingSettings>
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $messagingProfileID,
        array|MessagingProfileListPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListShortCodesParams $params
     *
     * @return DefaultPagination<ShortCode>
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $messagingProfileID,
        array|MessagingProfileListShortCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;
}
