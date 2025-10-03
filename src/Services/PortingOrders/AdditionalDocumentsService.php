<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentDeleteParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Filter;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Page;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AdditionalDocumentsContract;

use const Telnyx\Core\OMIT as omit;

final class AdditionalDocumentsService implements AdditionalDocumentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of additional documents for a porting order.
     *
     * @param list<AdditionalDocument> $additionalDocuments
     *
     * @throws APIException
     */
    public function create(
        string $id,
        $additionalDocuments = omit,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentNewResponse {
        $params = ['additionalDocuments' => $additionalDocuments];

        return $this->createRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AdditionalDocumentNewResponse {
        [$parsed, $options] = AdditionalDocumentCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['porting_orders/%1$s/additional_documents', $id],
            body: (object) $parsed,
            options: $options,
            convert: AdditionalDocumentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of additional documents for a porting order.
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[document_type]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort $sort Consolidated sort parameter (deepObject style). Originally: sort[value]
     *
     * @throws APIException
     */
    public function list(
        string $id,
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentListResponse {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];

        return $this->listRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): AdditionalDocumentListResponse {
        [$parsed, $options] = AdditionalDocumentListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/additional_documents', $id],
            query: $parsed,
            options: $options,
            convert: AdditionalDocumentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an additional document for a porting order.
     *
     * @param string $id
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = ['id' => $id];

        return $this->deleteRaw($additionalDocumentID, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $additionalDocumentID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AdditionalDocumentDeleteParams::parseRequest(
            $params,
            $requestOptions
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'porting_orders/%1$s/additional_documents/%2$s',
                $id,
                $additionalDocumentID,
            ],
            options: $options,
            convert: null,
        );
    }
}
