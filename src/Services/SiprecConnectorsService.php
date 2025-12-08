<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SiprecConnectorsContract;
use Telnyx\SiprecConnectors\SiprecConnectorCreateParams;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateParams;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

final class SiprecConnectorsService implements SiprecConnectorsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new SIPREC connector configuration.
     *
     * @param array{
     *   host: string, name: string, port: int, app_subdomain?: string
     * }|SiprecConnectorCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SiprecConnectorCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorNewResponse {
        [$parsed, $options] = SiprecConnectorCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SiprecConnectorNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'siprec_connectors',
            body: (object) $parsed,
            options: $options,
            convert: SiprecConnectorNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns details of a stored SIPREC connector.
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): SiprecConnectorGetResponse {
        /** @var BaseResponse<SiprecConnectorGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['siprec_connectors/%1$s', $connectorName],
            options: $requestOptions,
            convert: SiprecConnectorGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored SIPREC connector configuration.
     *
     * @param array{
     *   host: string, name: string, port: int, app_subdomain?: string
     * }|SiprecConnectorUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        array|SiprecConnectorUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorUpdateResponse {
        [$parsed, $options] = SiprecConnectorUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SiprecConnectorUpdateResponse> */
        $response = $this->client->request(
            method: 'put',
            path: ['siprec_connectors/%1$s', $connectorName],
            body: (object) $parsed,
            options: $options,
            convert: SiprecConnectorUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a stored SIPREC connector.
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['siprec_connectors/%1$s', $connectorName],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
