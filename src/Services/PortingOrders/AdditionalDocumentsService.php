<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort\Value;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AdditionalDocumentsContract;

final class AdditionalDocumentsService implements AdditionalDocumentsContract
{
    /**
     * @api
     */
    public AdditionalDocumentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AdditionalDocumentsRawService($client);
    }

    /**
     * @api
     *
     * Creates a list of additional documents for a porting order.
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
    ): AdditionalDocumentNewResponse {
        $params = ['additionalDocuments' => $additionalDocuments];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of additional documents for a porting order.
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
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes an additional document for a porting order.
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
    ): mixed {
        $params = ['id' => $id];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($additionalDocumentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
