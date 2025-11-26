<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams;
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
     * @param array{action?: 'json'|'link'}|InvoiceRetrieveParams $params
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['invoices/%1$s', $id],
            query: $parsed,
            options: $options,
            convert: InvoiceGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a paginated list of invoices.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}, sort?: 'period_start'|'-period_start'
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

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'invoices',
            query: $parsed,
            options: $options,
            convert: InvoiceListResponse::class,
        );
    }
}
