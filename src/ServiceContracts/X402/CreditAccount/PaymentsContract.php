<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\X402\CreditAccount;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\X402\CreditAccount\Payments\PaymentGetResponse;
use Telnyx\X402\CreditAccount\Payments\TransactionRecord;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PaymentsContract
{
    /**
     * @api
     *
     * @param string $id the x402 payment transaction ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PaymentGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TransactionRecord>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 100,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
