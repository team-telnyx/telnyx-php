<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingProfiles\MessagingProfileCreateParams;
use Telnyx\MessagingProfiles\MessagingProfileDeleteResponse;
use Telnyx\MessagingProfiles\MessagingProfileGetResponse;
use Telnyx\MessagingProfiles\MessagingProfileListParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersParams;
use Telnyx\MessagingProfiles\MessagingProfileListPhoneNumbersResponse;
use Telnyx\MessagingProfiles\MessagingProfileListResponse;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesParams;
use Telnyx\MessagingProfiles\MessagingProfileListShortCodesResponse;
use Telnyx\MessagingProfiles\MessagingProfileNewResponse;
use Telnyx\MessagingProfiles\MessagingProfileUpdateParams;
use Telnyx\MessagingProfiles\MessagingProfileUpdateResponse;
use Telnyx\RequestOptions;

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
        string $id,
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
        string $id,
        array|MessagingProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingProfileDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListPhoneNumbersParams $params
     *
     * @throws APIException
     */
    public function listPhoneNumbers(
        string $id,
        array|MessagingProfileListPhoneNumbersParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileListPhoneNumbersResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingProfileListShortCodesParams $params
     *
     * @throws APIException
     */
    public function listShortCodes(
        string $id,
        array|MessagingProfileListShortCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingProfileListShortCodesResponse;
}
