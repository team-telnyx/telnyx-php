<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\FqdnConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationListResponse;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\FqdnOutboundAuthentication;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\IPAuthenticationMethod;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface FqdnAuthenticationContract
{
    /**
     * @api
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $fqdnConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): FqdnAuthenticationListResponse;

    /**
     * @api
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param string $failoverURL the failover webhook URL
     * @param FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication> $fqdnOutboundAuthentication the outbound authentication type
     * @param IPAuthenticationMethod|value-of<IPAuthenticationMethod> $ipAuthenticationMethod the IP authentication method
     * @param string $password the password for authentication
     * @param string $txtName the TXT record name for Microsoft Teams SBC DNS verification
     * @param int $txtTtl the TTL for the TXT record
     * @param string $txtValue the TXT record value for Microsoft Teams SBC DNS verification
     * @param string $userName the username for authentication
     * @param string $webhookURL the webhook URL for authentication events
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function patchAll(
        string $fqdnConnectionID,
        ?string $failoverURL = null,
        FqdnOutboundAuthentication|string|null $fqdnOutboundAuthentication = null,
        IPAuthenticationMethod|string|null $ipAuthenticationMethod = null,
        ?string $password = null,
        ?string $txtName = null,
        ?int $txtTtl = null,
        ?string $txtValue = null,
        ?string $userName = null,
        ?string $webhookURL = null,
        RequestOptions|array|null $requestOptions = null,
    ): FqdnAuthenticationPatchAllResponse;
}
