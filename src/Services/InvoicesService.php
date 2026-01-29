<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InvoicesContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InvoicesService implements InvoicesContract
{
    /**
     * @api
     */
    public InvoicesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InvoicesRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a single invoice by its unique identifier.
     *
     * @param string $id Invoice UUID
     * @param Action|value-of<Action> $action Invoice action
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        Action|string|null $action = null,
        RequestOptions|array|null $requestOptions = null,
    ): InvoiceGetResponse {
        $params = Util::removeNulls(['action' => $action]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of invoices.
     *
     * @param Sort|value-of<Sort> $sort specifies the sort order for results
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<InvoiceListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
