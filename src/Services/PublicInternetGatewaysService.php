<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams\Body;
use Telnyx\PublicInternetGateways\PublicInternetGatewayDeleteResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayGetResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter;
use Telnyx\PublicInternetGateways\PublicInternetGatewayNewResponse;
use Telnyx\PublicInternetGateways\PublicInternetGatewayRead;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PublicInternetGatewaysContract;

/**
 * Public Internet Gateway operations.
 *
 * @phpstan-import-type BodyShape from \Telnyx\PublicInternetGateways\PublicInternetGatewayCreateParams\Body
 * @phpstan-import-type FilterShape from \Telnyx\PublicInternetGateways\PublicInternetGatewayListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PublicInternetGatewaysService implements PublicInternetGatewaysContract
{
    /**
     * @api
     */
    public PublicInternetGatewaysRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new PublicInternetGatewaysRawService($client);
    }

    /**
     * @api
     *
     * Requests creation of a public internet gateway on the specified network, giving the network internet egress. Creation is asynchronous, so the request is accepted and completes in the background.
     *
     * @param Body|BodyShape $body
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Body|array $body,
        RequestOptions|array|null $requestOptions = null
    ): PublicInternetGatewayNewResponse {
        $params = Util::removeNulls(['body' => $body]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details of a single public internet gateway by its identifier.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PublicInternetGatewayGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a paginated list of the public internet gateways on your account, with support for filtering.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[network_id]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PublicInternetGatewayRead>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the specified public internet gateway, removing internet egress through it.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PublicInternetGatewayDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
