<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\X402;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\X402\CreditAccount\CreditAccountCreatePaymentQuoteParams;
use Telnyx\X402\CreditAccount\CreditAccountNewPaymentQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettlePaymentParams;
use Telnyx\X402\CreditAccount\CreditAccountSettlePaymentResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CreditAccountRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CreditAccountCreatePaymentQuoteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreditAccountNewPaymentQuoteResponse>
     *
     * @throws APIException
     */
    public function createPaymentQuote(
        array|CreditAccountCreatePaymentQuoteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CreditAccountSettlePaymentParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreditAccountSettlePaymentResponse>
     *
     * @throws APIException
     */
    public function settlePayment(
        array|CreditAccountSettlePaymentParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
