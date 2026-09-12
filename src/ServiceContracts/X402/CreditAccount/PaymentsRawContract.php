<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\X402\CreditAccount;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\X402\CreditAccount\Payments\PaymentGetResponse;
use Telnyx\X402\CreditAccount\Payments\PaymentListParams;
use Telnyx\X402\CreditAccount\Payments\TransactionRecord;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PaymentsRawContract
{
    /**
     * @api
     *
     * @param string $id the x402 payment transaction ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PaymentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PaymentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TransactionRecord>>
     *
     * @throws APIException
     */
    public function list(
        array|PaymentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
