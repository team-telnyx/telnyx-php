<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\X402;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettleResponse;

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
    public function createQuote(
        string $amountUsd,
        RequestOptions|array|null $requestOptions = null
    ): CreditAccountNewQuoteResponse;

    /**
     * @api
     *
     * @param string $id body param: The quote ID to settle
     * @param string $paymentSignature Body param: Base64-encoded signed payment authorization (x402 PaymentPayload). Can alternatively be provided via the PAYMENT-SIGNATURE header.
     * @param string $paymentSignatureHeader Header param: Signed payment authorization for the quote. Alternative to providing `payment_signature` in the request body.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function settle(
        string $id,
        ?string $paymentSignature = null,
        ?string $paymentSignatureHeader = null,
        RequestOptions|array|null $requestOptions = null,
    ): CreditAccountSettleResponse;
}
