<?php

declare(strict_types=1);

namespace Telnyx\Services\FqdnConnections;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationListResponse;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\FqdnOutboundAuthentication;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\IPAuthenticationMethod;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnConnections\FqdnAuthenticationContract;

/**
 * FQDN connection operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FqdnAuthenticationService implements FqdnAuthenticationContract
{
    /**
     * @api
     */
    public FqdnAuthenticationRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new FqdnAuthenticationRawService($client);
    }

    /**
     * @api
     *
     * Retrieves the details of an existing FQDN authentication strategy for a specific FQDN connection.
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $fqdnConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): FqdnAuthenticationListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($fqdnConnectionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates the FQDN authentication strategy for a specific FQDN connection.
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
    ): FqdnAuthenticationPatchAllResponse {
        $params = Util::removeNulls(
            [
                'failoverURL' => $failoverURL,
                'fqdnOutboundAuthentication' => $fqdnOutboundAuthentication,
                'ipAuthenticationMethod' => $ipAuthenticationMethod,
                'password' => $password,
                'txtName' => $txtName,
                'txtTtl' => $txtTtl,
                'txtValue' => $txtValue,
                'userName' => $userName,
                'webhookURL' => $webhookURL,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->patchAll($fqdnConnectionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
