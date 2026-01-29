<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Invoices\InvoiceGetResponse;
use Telnyx\Invoices\InvoiceListParams;
use Telnyx\Invoices\InvoiceListParams\Sort;
use Telnyx\Invoices\InvoiceListResponse;
use Telnyx\Invoices\InvoiceRetrieveParams;
use Telnyx\Invoices\InvoiceRetrieveParams\Action;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\InvoicesRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InvoicesRawService implements InvoicesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a single invoice by its unique identifier.
     *
     * @param string $id Invoice UUID
     * @param array{action?: Action|value-of<Action>}|InvoiceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<InvoiceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|InvoiceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   pageNumber?: int, pageSize?: int, sort?: Sort|value-of<Sort>
     * }|InvoiceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<InvoiceListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|InvoiceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InvoiceListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'invoices',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: InvoiceListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
