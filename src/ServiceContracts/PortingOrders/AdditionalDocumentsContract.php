<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentDeleteParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;

interface AdditionalDocumentsContract
{
    /**
     * @api
     *
     * @param array<mixed>|AdditionalDocumentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|AdditionalDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|AdditionalDocumentListParams $params
     *
     * @return DefaultPagination<AdditionalDocumentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|AdditionalDocumentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param array<mixed>|AdditionalDocumentDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        array|AdditionalDocumentDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
