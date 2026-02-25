<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PaymentContract
{
    /**
     * @api
     *
     * @param string $amount Amount in dollars and cents, e.g. "120.00"
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createStoredPaymentTransaction(
        string $amount,
        RequestOptions|array|null $requestOptions = null
    ): PaymentNewStoredPaymentTransactionResponse;
}
