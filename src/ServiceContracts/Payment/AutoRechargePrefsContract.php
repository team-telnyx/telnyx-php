<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Payment;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;

interface AutoRechargePrefsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AutoRechargePrefUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|AutoRechargePrefUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRechargePrefUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AutoRechargePrefListResponse;
}
