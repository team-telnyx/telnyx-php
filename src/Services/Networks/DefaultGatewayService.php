<?php

declare(strict_types=1);

namespace Telnyx\Services\Networks;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Networks\DefaultGateway\DefaultGatewayDeleteResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayGetResponse;
use Telnyx\Networks\DefaultGateway\DefaultGatewayNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Networks\DefaultGatewayContract;

final class DefaultGatewayService implements DefaultGatewayContract
{
    /**
     * @api
     */
    public DefaultGatewayRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DefaultGatewayRawService($client);
    }

    /**
     * @api
     *
     * Create Default Gateway.
     *
     * @param string $networkIdentifier identifies the resource
     * @param string $wireguardPeerID wireguard peer ID
     *
     * @throws APIException
     */
    public function create(
        string $networkIdentifier,
        ?string $wireguardPeerID = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultGatewayNewResponse {
        $params = ['wireguardPeerID' => $wireguardPeerID];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($networkIdentifier, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get Default Gateway status.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete Default Gateway.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DefaultGatewayDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
