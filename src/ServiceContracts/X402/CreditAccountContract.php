<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\X402;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettlePaymentResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CreditAccountContract
{
    /**
     * @api
     *
     * @param string $amountUsd Amount in USD to fund (minimum 5.00, maximum 10000.00).
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createPaymentQuote(
        string $amountUsd,
        RequestOptions|array|null $requestOptions = null
    ): CreditAccountNewPaymentQuoteResponse;

    /**
     * @api
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
    ): CreditAccountSettlePaymentResponse;
}
