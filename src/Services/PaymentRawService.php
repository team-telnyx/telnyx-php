<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\PaymentCreateStoredPaymentTransactionParams;
use Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PaymentRawContract;

/**
 * Operations for managing stored payment transactions.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PaymentRawService implements PaymentRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a stored payment transaction
     *
     * @param array{amount: string}|PaymentCreateStoredPaymentTransactionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PaymentNewStoredPaymentTransactionResponse>
     *
     * @throws APIException
     */
    public function createStoredPaymentTransaction(
        array|PaymentCreateStoredPaymentTransactionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaymentCreateStoredPaymentTransactionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/payment/stored_payment_transactions',
            body: (object) $parsed,
            options: $options,
            convert: PaymentNewStoredPaymentTransactionResponse::class,
        );
    }
}
