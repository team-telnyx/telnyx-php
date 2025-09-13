<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SiprecConnectorsContract;
use Telnyx\SiprecConnectors\SiprecConnectorCreateParams;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateParams;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $host hostname/IPv4 address of the SIPREC SRS
     * @param string $name name for the SIPREC connector resource
     * @param int $port port for the SIPREC SRS
     * @param string $appSubdomain subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS)
     *
     * @return SiprecConnectorNewResponse<HasRawResponse>
     */
    public function create(
        $host,
        $name,
        $port,
        $appSubdomain = omit,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorNewResponse {
        [$parsed, $options] = SiprecConnectorCreateParams::parseRequest(
            [
                'host' => $host,
                'name' => $name,
                'port' => $port,
                'appSubdomain' => $appSubdomain,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @return SiprecConnectorGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): SiprecConnectorGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param string $host hostname/IPv4 address of the SIPREC SRS
     * @param string $name name for the SIPREC connector resource
     * @param int $port port for the SIPREC SRS
     * @param string $appSubdomain subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS)
     *
     * @return SiprecConnectorUpdateResponse<HasRawResponse>
     */
    public function update(
        string $connectorName,
        $host,
        $name,
        $port,
        $appSubdomain = omit,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorUpdateResponse {
        [$parsed, $options] = SiprecConnectorUpdateParams::parseRequest(
            [
                'host' => $host,
                'name' => $name,
                'port' => $port,
                'appSubdomain' => $appSubdomain,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['siprec_connectors/%1$s', $connectorName],
            options: $requestOptions,
            convert: null,
        );
    }
}
