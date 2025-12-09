<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InvoicesContract;

final class InvoicesService implements InvoicesContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single invoice by its unique identifier.
     *
     * @param array{action?: 'json'|'link'|Action}|InvoiceRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|InvoiceRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): InvoiceGetResponse {
        [$parsed, $options] = InvoiceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InvoiceGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['invoices/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: InvoiceGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a paginated list of invoices.
     *
     * @param array{
     *   page?: array{number?: int, size?: int},
     *   sort?: 'period_start'|'-period_start'|Sort,
     * }|InvoiceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): InvoiceListResponse {
        [$parsed, $options] = InvoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<InvoiceListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'invoices',
            query: $parsed,
            options: $options,
            convert: InvoiceListResponse::class,
        );

        return $response->parse();
    }
}
