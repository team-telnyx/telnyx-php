<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams;
use Telnyx\Invoices\InvoiceListParams\Page;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InvoicesContract;

use const Telnyx\Core\OMIT as omit;

final class InvoicesService implements InvoicesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single invoice by its unique identifier.
     *
     * @param Action|value-of<Action> $action Invoice action
     *
     * @return InvoiceGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        $action = omit,
        ?RequestOptions $requestOptions = null
    ): InvoiceGetResponse {
        [$parsed, $options] = InvoiceRetrieveParams::parseRequest(
            ['action' => $action],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['invoices/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: InvoiceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of invoices.
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param Sort|value-of<Sort> $sort specifies the sort order for results
     *
     * @return InvoiceListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null
    ): InvoiceListResponse {
        [$parsed, $options] = InvoiceListParams::parseRequest(
            ['page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'invoices',
            query: $parsed,
            options: $options,
            convert: InvoiceListResponse::class,
        );
    }
}
