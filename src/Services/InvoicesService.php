<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InvoicesContract;

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
     * @param 'json'|'link'|Action $action Invoice action
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        string|Action|null $action = null,
        ?RequestOptions $requestOptions = null,
    ): InvoiceGetResponse {
        $params = ['action' => $action];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of invoices.
     *
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param 'period_start'|'-period_start'|Sort $sort specifies the sort order for results
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): InvoiceListResponse {
        $params = ['page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
