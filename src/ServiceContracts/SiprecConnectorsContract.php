<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SiprecConnectors\SiprecConnectorGetResponse;
use Telnyx\SiprecConnectors\SiprecConnectorNewResponse;
use Telnyx\SiprecConnectors\SiprecConnectorUpdateResponse;

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
     * @throws APIException
     */
    public function create(
        string $host,
        string $name,
        int $port,
        ?string $appSubdomain = null,
        ?RequestOptions $requestOptions = null,
    ): SiprecConnectorNewResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
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
    ): SiprecConnectorUpdateResponse;

    /**
     * @api
     *
     * @param string $connectorName uniquely identifies a SIPREC connector
     *
     * @throws APIException
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
