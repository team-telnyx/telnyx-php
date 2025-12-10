<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams;
use Telnyx\RequestOptions;

interface InvoicesRawContract
{
    /**
     * @api
     *
     * @param string $id Invoice UUID
     * @param array<mixed>|InvoiceRetrieveParams $params
     *
     * @return BaseResponse<InvoiceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|InvoiceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|InvoiceListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<InvoiceListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
