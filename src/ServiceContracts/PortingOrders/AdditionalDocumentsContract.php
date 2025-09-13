<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Page;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AdditionalDocumentsContract
{
    /**
     * @api
     *
     * @param list<AdditionalDocument> $additionalDocuments
     *
     * @return AdditionalDocumentNewResponse<HasRawResponse>
     */
    public function create(
        string $id,
        $additionalDocuments = omit,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentNewResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[document_type]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return AdditionalDocumentListResponse<HasRawResponse>
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentListResponse;

    /**
     * @api
     *
     * @param string $id
     */
    public function delete(
        string $additionalDocumentID,
        $id,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
