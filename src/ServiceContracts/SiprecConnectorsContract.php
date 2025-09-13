<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
     * @return SiprecConnectorGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $connectorName,
        ?RequestOptions $requestOptions = null
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
     */
    public function delete(
        string $connectorName,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
