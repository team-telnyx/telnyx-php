<?php

declare(strict_types=1);

namespace Telnyx\Services\PortingOrders;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentCreateParams\AdditionalDocument\DocumentType;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentDeleteParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListParams\Sort\Value;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentListResponse;
use Telnyx\PortingOrders\AdditionalDocuments\AdditionalDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingOrders\AdditionalDocumentsRawContract;

final class AdditionalDocumentsRawService implements AdditionalDocumentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of additional documents for a porting order.
     *
     * @param string $id Porting Order id
     * @param array{
     *   additionalDocuments?: list<array{
     *     documentID?: string,
     *     documentType?: 'loa'|'invoice'|'csr'|'other'|DocumentType,
     *   }>,
     * }|AdditionalDocumentCreateParams $params
     *
     * @return BaseResponse<AdditionalDocumentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|AdditionalDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdditionalDocumentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id Porting Order id
     * @param array{
     *   filter?: array{
     *     documentType?: list<'loa'|'invoice'|'csr'|'other'|AdditionalDocumentListParams\Filter\DocumentType>,
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: array{value?: 'created_at'|'-created_at'|Value},
     * }|AdditionalDocumentListParams $params
     *
     * @return BaseResponse<DefaultPagination<AdditionalDocumentListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|AdditionalDocumentListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdditionalDocumentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['porting_orders/%1$s/additional_documents', $id],
            query: $parsed,
            options: $options,
            convert: AdditionalDocumentListResponse::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an additional document for a porting order.
     *
     * @param string $additionalDocumentID additional document identification
     * @param array{id: string}|AdditionalDocumentDeleteParams $params
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $additionalDocumentID,
        array|AdditionalDocumentDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AdditionalDocumentDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $id = $parsed['id'];
        unset($parsed['id']);

        // @phpstan-ignore-next-line return.type
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
