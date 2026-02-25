<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\PaymentCreateStoredPaymentTransactionParams;
use Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PaymentRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PaymentCreateStoredPaymentTransactionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PaymentNewStoredPaymentTransactionResponse>
     *
     * @throws APIException
     */
    public function createStoredPaymentTransaction(
        array|PaymentCreateStoredPaymentTransactionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
