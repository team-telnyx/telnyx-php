<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface SiprecConnectorsContract
{
    /**
     * @api
     *
     * @param string $host hostname/IPv4 address of the SIPREC SRS
     * @param string $name name for the SIPREC connector resource
     * @param int $port port for the SIPREC SRS
     * @param string $appSubdomain subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS)
     *
     * @return SiprecConnectorNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $host,
        $name,
        $port,
        $appSubdomain = omit,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SiprecConnectorNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SiprecConnectorNewResponse;

    /**
     * @api
     *
     * @return SiprecConnectorGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): SiprecConnectorGetResponse;

    /**
     * @api
     *
     * @return SiprecConnectorGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $connectorName,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorGetResponse;

    /**
     * @api
     *
     * @param string $host hostname/IPv4 address of the SIPREC SRS
     * @param string $name name for the SIPREC connector resource
     * @param int $port port for the SIPREC SRS
     * @param string $appSubdomain subdomain to route the call when using Telnyx SRS (optional for non-Telnyx SRS)
     *
     * @return SiprecConnectorUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $connectorName,
        $host,
        $name,
        $port,
        $appSubdomain = omit,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SiprecConnectorUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $connectorName,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorUpdateResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $connectorName,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
