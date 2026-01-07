<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumber;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberGetResponse;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberListParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateParams;
use Telnyx\MobilePhoneNumbers\MobilePhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobilePhoneNumbersRawContract
{
    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobilePhoneNumberGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id The ID of the mobile phone number
     * @param array<string,mixed>|MobilePhoneNumberUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MobilePhoneNumberUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|MobilePhoneNumberUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MobilePhoneNumberListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MobilePhoneNumber>>
     *
     * @throws APIException
     */
    public function list(
        array|MobilePhoneNumberListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
