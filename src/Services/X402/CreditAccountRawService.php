<?php

declare(strict_types=1);

namespace Telnyx\Services\X402;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\X402\CreditAccountRawContract;
use Telnyx\X402\CreditAccount\CreditAccountCreateQuoteParams;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettleParams;
use Telnyx\X402\CreditAccount\CreditAccountSettleResponse;

/**
 * Operations for x402 cryptocurrency payment transactions. Fund your Telnyx account using USDC stablecoin payments via the x402 protocol.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CreditAccountRawService implements CreditAccountRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a payment quote for the specified USD amount. Returns payment details including the x402 payment requirements, network, and expiration time. The quote must be settled before it expires.
     *
     * @param array{amountUsd: string}|CreditAccountCreateQuoteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreditAccountNewQuoteResponse>
     *
     * @throws APIException
     */
    public function createQuote(
        array|CreditAccountCreateQuoteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CreditAccountCreateQuoteParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/x402/credit_account/quote',
            body: (object) $parsed,
            options: $options,
            convert: CreditAccountNewQuoteResponse::class,
        );
    }

    /**
     * @api
     *
     * Settles an x402 payment using the quote ID and a signed payment authorization. The payment signature can be provided via the `PAYMENT-SIGNATURE` header or the `payment_signature` body parameter. Settlement is idempotent — submitting the same quote ID multiple times returns the existing transaction.
     *
     * @param array{
     *   id: string, paymentSignature?: string, paymentSignatureHeader?: string
     * }|CreditAccountSettleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreditAccountSettleResponse>
     *
     * @throws APIException
     */
    public function settle(
        array|CreditAccountSettleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CreditAccountSettleParams::parseRequest(
            $params,
            $requestOptions,
        );
        $header_params = ['paymentSignatureHeader' => 'PAYMENT-SIGNATURE'];

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/x402/credit_account',
            headers: Util::array_transform_keys(
                array_intersect_key($parsed, array_flip(array_keys($header_params))),
                $header_params,
            ),
            body: (object) array_diff_key(
                $parsed,
                array_flip(array_keys($header_params))
            ),
            options: $options,
            convert: CreditAccountSettleResponse::class,
        );
    }
}
