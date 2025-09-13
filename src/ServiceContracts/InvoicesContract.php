<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams\Page;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface InvoicesContract
{
    /**
     * @api
     *
     * @param Action|value-of<Action> $action Invoice action
     *
     * @return InvoiceGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        $action = omit,
        ?RequestOptions $requestOptions = null
    ): InvoiceGetResponse;

    /**
     * @api
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
    ): InvoiceListResponse;
}
