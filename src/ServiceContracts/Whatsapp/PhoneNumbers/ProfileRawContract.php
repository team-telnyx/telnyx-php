<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateParams;
use Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ProfileRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $phoneNumber,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param array<string,mixed>|ProfileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        array|ProfileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
