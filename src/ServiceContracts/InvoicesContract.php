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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InvoicesContract
{
    /**
     * @api
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
    ): InvoiceGetResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;
}
