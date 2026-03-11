<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\PhoneNumbers;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingGetResponse;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingUpdateParams;
use Telnyx\Whatsapp\PhoneNumbers\CallingSettings\CallingSettingUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CallingSettingsRawContract
{
    /**
     * @api
     *
     * @param string $phoneNumber Phone number (E.164 format)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingSettingGetResponse>
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
     * @param array<string,mixed>|CallingSettingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallingSettingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumber,
        array|CallingSettingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
