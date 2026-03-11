<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp\BusinessAccounts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingGetResponse;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateParams;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SettingsRawContract
{
    /**
     * @api
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingGetResponse>
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
     * @param string $id Whatsapp Business Account ID
     * @param array<string,mixed>|SettingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SettingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
