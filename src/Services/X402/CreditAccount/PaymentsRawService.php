<?php

declare(strict_types=1);

namespace Telnyx\Services\X402\CreditAccount;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\X402\CreditAccount\PaymentsRawContract;
use Telnyx\X402\CreditAccount\Payments\PaymentGetResponse;
use Telnyx\X402\CreditAccount\Payments\PaymentListParams;
use Telnyx\X402\CreditAccount\Payments\TransactionRecord;

/**
 * Operations for x402 cryptocurrency payment transactions. Fund your Telnyx account using USDC stablecoin payments via the x402 protocol.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PaymentsRawService implements PaymentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns a single x402 payment transaction by ID. The transaction must belong to the authenticated user; organization sub-users must have read permission on transactions. Returns 404 if the transaction does not exist or belongs to another user.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/x402/credit_account/payments/%1$s', $id],
            options: $requestOptions,
            convert: PaymentGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of the authenticated user's x402 payment transactions, newest first. Organization sub-users must have read permission on transactions; without it the list is empty.
     *
     * @param array{pageNumber?: int, pageSize?: int}|PaymentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TransactionRecord>>
     *
     * @throws APIException
     */
    public function list(
        array|PaymentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PaymentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/x402/credit_account/payments',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: TransactionRecord::class,
            page: DefaultFlatPagination::class,
        );
    }
}
