<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
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
        $params = array_filter(
            ['action' => $action ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of your invoices, with support for sorting.
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
        $params = array_filter(
            [
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
                'sort' => $sort ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
