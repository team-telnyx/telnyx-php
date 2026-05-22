<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\UserData\UserDataGetResponse;
use Telnyx\Whatsapp\UserData\UserDataUpdateParams;
use Telnyx\Whatsapp\UserData\UserDataUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UserDataRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserDataGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|UserDataUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserDataUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|UserDataUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
