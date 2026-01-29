<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Page;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type AdditionalDocumentShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Page
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AdditionalDocumentsContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param list<AdditionalDocument|AdditionalDocumentShape> $additionalDocuments
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $additionalDocuments = null,
        RequestOptions|array|null $requestOptions = null,
    ): AdditionalDocumentNewResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[document_type]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<AdditionalDocumentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $additionalDocumentID additional document identification
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
