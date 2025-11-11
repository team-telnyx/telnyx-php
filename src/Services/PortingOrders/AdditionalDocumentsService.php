<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentDeleteParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AdditionalDocumentsContract;

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
     * @param array{
     *   additional_documents?: list<array{
     *     document_id?: string, document_type?: "loa"|"invoice"|"csr"|"other"
     *   }>,
     * }|AdditionalDocumentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|AdditionalDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentNewResponse {
        [$parsed, $options] = AdditionalDocumentCreateParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{
     *   filter?: array{document_type?: list<"loa"|"invoice"|"csr"|"other">},
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: "created_at"|"-created_at"},
     * }|AdditionalDocumentListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|AdditionalDocumentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AdditionalDocumentListResponse {
        [$parsed, $options] = AdditionalDocumentListParams::parseRequest(
            $params,
            $requestOptions,
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
     * @param array{id: string}|AdditionalDocumentDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        array|AdditionalDocumentDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = AdditionalDocumentDeleteParams::parseRequest(
            $params,
            $requestOptions,
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
