<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\X402;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\X402\CreditAccount\CreditAccountCreateQuoteParams;
use Telnyx\X402\CreditAccount\CreditAccountNewQuoteResponse;
use Telnyx\X402\CreditAccount\CreditAccountSettleParams;
use Telnyx\X402\CreditAccount\CreditAccountSettleResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface CreditAccountRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|CreditAccountCreateQuoteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreditAccountNewQuoteResponse>
     *
     * @throws APIException
     */
    public function createQuote(
        array|CreditAccountCreateQuoteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|CreditAccountSettleParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CreditAccountSettleResponse>
     *
     * @throws APIException
     */
    public function settle(
        array|CreditAccountSettleParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
