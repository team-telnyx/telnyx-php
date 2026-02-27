<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AdditionalDocumentsContract;

/**
 * Endpoints related to porting orders management.
 *
 * @phpstan-import-type AdditionalDocumentShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument
 * @phpstan-import-type FilterShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter
 * @phpstan-import-type SortShape from \Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param list<AdditionalDocument|AdditionalDocumentShape> $additionalDocuments
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $additionalDocuments = null,
        RequestOptions|array|null $requestOptions = null,
    ): AdditionalDocumentNewResponse {
        $params = Util::removeNulls(
            ['additionalDocuments' => $additionalDocuments]
        );

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
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[document_type]
     * @param Sort|SortShape $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<AdditionalDocumentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        Sort|array|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        string $id,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['id' => $id]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($additionalDocumentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
