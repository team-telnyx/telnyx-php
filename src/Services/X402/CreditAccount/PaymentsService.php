<?php

declare(strict_types=1);

namespace Telnyx\Services\X402\CreditAccount;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\X402\CreditAccount\PaymentsContract;
use Telnyx\X402\CreditAccount\Payments\PaymentGetResponse;
use Telnyx\X402\CreditAccount\Payments\TransactionRecord;

/**
 * Operations for x402 cryptocurrency payment transactions. Fund your Telnyx account using USDC stablecoin payments via the x402 protocol.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PaymentsService implements PaymentsContract
{
    /**
     * @api
     */
    public PaymentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PaymentsRawService($client);
    }

    /**
     * @api
     *
     * Returns a single x402 payment transaction by ID. The transaction must belong to the authenticated user; organization sub-users must have read permission on transactions. Returns 404 if the transaction does not exist or belongs to another user.
     *
     * @param string $id the x402 payment transaction ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PaymentGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of the authenticated user's x402 payment transactions, newest first. Organization sub-users must have read permission on transactions; without it the list is empty.
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
    ): DefaultFlatPagination {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
