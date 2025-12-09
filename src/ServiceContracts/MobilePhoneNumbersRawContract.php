<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface MobilePhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     *
     * @return BaseResponse<MobilePhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     * @param array<mixed>|MobilePhoneNumberUpdateParams $params
     *
     * @return BaseResponse<MobilePhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobilePhoneNumberUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|MobilePhoneNumberListParams $params
     *
     * @return BaseResponse<MobilePhoneNumberListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePhoneNumberListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
