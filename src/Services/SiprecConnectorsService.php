<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SiprecConnectorsContract;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

final class SiprecConnectorsService implements SiprecConnectorsContract
{
    /**
     * @api
     */
    public SiprecConnectorsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SiprecConnectorsRawService($client);
    }

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
     * @throws APIException
     */
    public function create(
        string $host,
        string $name,
        int $port,
        ?string $appSubdomain = null,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorNewResponse {
        $params = [
            'host' => $host,
            'name' => $name,
            'port' => $port,
            'appSubdomain' => $appSubdomain,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns details of a stored SIPREC connector.
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): SiprecConnectorGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($connectorName, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a stored SIPREC connector configuration.
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     * @param string $host hostname/IPv4 address of the SIPREC SRS
     * @param string $name name for the SIPREC connector resource
     * @param int $port port for the SIPREC SRS
     * @param string $appSubdomain subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS)
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        string $host,
        string $name,
        int $port,
        ?string $appSubdomain = null,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorUpdateResponse {
        $params = [
            'host' => $host,
            'name' => $name,
            'port' => $port,
            'appSubdomain' => $appSubdomain,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($connectorName, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a stored SIPREC connector.
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($connectorName, requestOptions: $requestOptions);

        return $response->parse();
    }
}
