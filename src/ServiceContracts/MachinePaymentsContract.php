<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MachinePayments\MachinePaymentAccountCreditResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MachinePaymentsContract
{
    /**
     * @api
     *
     * @param string $amountUsd Amount to credit in USD, as a decimal string with up to two fractional digits (by default between 5.00 and 500.00). The request body is required on the initial challenge request and remains required on a paid retry, where you re-send the identical body plus the payment credential — the credential, not the body, selects the payment, and the retried body is not re-validated.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function accountCredit(
        string $amountUsd,
        RequestOptions|array|null $requestOptions = null
    ): MachinePaymentAccountCreditResponse;
}
