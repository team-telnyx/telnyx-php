<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MachinePayments\MachinePaymentAccountCreditParams;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MachinePaymentsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MachinePaymentAccountCreditParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MachinePaymentAccountCreditResponse>
     *
     * @throws APIException
     */
    public function accountCredit(
        array|MachinePaymentAccountCreditParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
