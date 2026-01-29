<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Payment;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AutoRechargePrefsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|AutoRechargePrefUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AutoRechargePrefUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|AutoRechargePrefUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AutoRechargePrefListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
