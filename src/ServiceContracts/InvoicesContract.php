<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;

interface InvoicesContract
{
    /**
     * @api
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
    ): InvoiceGetResponse;

    /**
     * @api
     *
     * @param 'period_start'|'-period_start'|Sort $sort specifies the sort order for results
     *
     * @return DefaultFlatPagination<InvoiceListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPagination;
}
