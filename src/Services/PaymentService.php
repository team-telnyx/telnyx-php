<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Payment\PaymentNewStoredPaymentTransactionResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PaymentContract;
use Telnyx\Services\Payment\AutoRechargePrefsService;

/**
 * Operations for managing stored payment transactions.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PaymentService implements PaymentContract
{
    /**
     * @api
     */
    public PaymentRawService $raw;

    /**
     * @api
     */
    public AutoRechargePrefsService $autoRechargePrefs;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaymentRawService($client);
        $this->autoRechargePrefs = new AutoRechargePrefsService($client);
    }

    /**
     * @api
     *
     * Create a stored payment transaction
     *
     * @param string $amount Amount in dollars and cents, e.g. "120.00"
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createStoredPaymentTransaction(
        string $amount,
        RequestOptions|array|null $requestOptions = null
    ): PaymentNewStoredPaymentTransactionResponse {
        $params = Util::removeNulls(['amount' => $amount]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createStoredPaymentTransaction(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
