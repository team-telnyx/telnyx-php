<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PortingOrders;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort\Value;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;

interface AdditionalDocumentsContract
{
    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param list<array{
     *   documentID?: string, documentType?: 'loa'|'invoice'|'csr'|'other'|DocumentType
     * }> $additionalDocuments
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $additionalDocuments = null,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentNewResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array{
     *   documentType?: list<'loa'|'invoice'|'csr'|'other'|\Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter\DocumentType>,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[document_type]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param array{
     *   value?: 'created_at'|'-created_at'|Value
     * } $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @return DefaultPagination<AdditionalDocumentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $additionalDocumentID additional document identification
     * @param string $id Porting Order id
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        string $id,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
