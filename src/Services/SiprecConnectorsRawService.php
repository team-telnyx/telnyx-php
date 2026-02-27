<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SiprecConnectorsRawContract;
use Telnyx\SiprecConnectors\SiprecConnectorCreateParams;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateParams;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

/**
 * SIPREC connectors configuration.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SiprecConnectorsRawService implements SiprecConnectorsRawContract
{
    // @phpstan-ignore-next-line
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
     *   host: string, name: string, port: int, appSubdomain?: string
     * }|SiprecConnectorCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecConnectorNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SiprecConnectorCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SiprecConnectorCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'siprec_connectors',
            body: (object) $parsed,
            options: $options,
            convert: SiprecConnectorNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns details of a stored SIPREC connector.
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecConnectorGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['siprec_connectors/%1$s', $connectorName],
            options: $requestOptions,
            convert: SiprecConnectorGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a stored SIPREC connector configuration.
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param array{
     *   host: string, name: string, port: int, appSubdomain?: string
     * }|SiprecConnectorUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SiprecConnectorUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        array|SiprecConnectorUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SiprecConnectorUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['siprec_connectors/%1$s', $connectorName],
            body: (object) $parsed,
            options: $options,
            convert: SiprecConnectorUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a stored SIPREC connector.
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['siprec_connectors/%1$s', $connectorName],
            options: $requestOptions,
            convert: null,
        );
    }
}
