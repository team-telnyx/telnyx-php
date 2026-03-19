<?php

declare(strict_types=1);

namespace Telnyx\Services\X402;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\X402\CreditAccountContract;
use Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettlePaymentResponse;

/**
 * Operations for x402 cryptocurrency payment transactions. Fund your Telnyx account using USDC stablecoin payments via the x402 protocol.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CreditAccountService implements CreditAccountContract
{
    /**
     * @api
     */
    public CreditAccountRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new CreditAccountRawService($client);
    }

    /**
     * @api
     *
     * Creates a payment quote for the specified USD amount. Returns payment details including the x402 payment requirements, network, and expiration time. The quote must be settled before it expires.
     *
     * @param string $amountUsd Amount in USD to fund (minimum 5.00, maximum 10000.00).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPaymentQuote(
        string $amountUsd,
        RequestOptions|array|null $requestOptions = null
    ): CreditAccountNewPaymentQuoteResponse {
        $params = Util::removeNulls(['amountUsd' => $amountUsd]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createPaymentQuote(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Settles an x402 payment using the quote ID and a signed payment authorization. The payment signature can be provided via the `PAYMENT-SIGNATURE` header or the `payment_signature` body parameter. Settlement is idempotent — submitting the same quote ID multiple times returns the existing transaction.
     *
     * @param string $id body param: The quote ID to settle
     * @param string $paymentSignature Body param: Base64-encoded signed payment authorization (x402 PaymentPayload). Can alternatively be provided via the PAYMENT-SIGNATURE header.
     * @param string $paymentSignature1 Header param: Signed payment authorization for the quote. Alternative to providing `payment_signature` in the request body.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function settlePayment(
        string $id,
        ?string $paymentSignature = null,
        ?string $paymentSignature1 = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreditAccountSettlePaymentResponse {
        $params = Util::removeNulls(
            [
                'id' => $id,
                'paymentSignature' => $paymentSignature,
                'paymentSignature1' => $paymentSignature1,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->settlePayment(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
