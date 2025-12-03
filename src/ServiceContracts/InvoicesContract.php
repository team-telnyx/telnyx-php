<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams;
use Telnyx\RequestOptions;

interface InvoicesContract
{
    /**
     * @api
     *
     * @param array<mixed>|InvoiceRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|InvoiceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InvoiceGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|InvoiceListParams $params
     *
     * @return DefaultFlatPagination<InvoiceListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): DefaultFlatPagination;
}
