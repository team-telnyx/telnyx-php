<?php

declare(strict_types=1);

namespace Telnyx\Services\FqdnConnections;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationListResponse;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\FqdnOutboundAuthentication;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllParams\IPAuthenticationMethod;
use Telnyx\FqdnConnections\FqdnAuthentication\FqdnAuthenticationPatchAllResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FqdnConnections\FqdnAuthenticationRawContract;

/**
 * FQDN connection operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class FqdnAuthenticationRawService implements FqdnAuthenticationRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves the details of an existing FQDN authentication strategy for a specific FQDN connection.
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnAuthenticationListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $fqdnConnectionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['fqdn_connections/%1$s/fqdn_authentication', $fqdnConnectionID],
            options: $requestOptions,
            convert: FqdnAuthenticationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates the FQDN authentication strategy for a specific FQDN connection.
     *
     * @param string $fqdnConnectionID the ID of the FQDN connection
     * @param array{
     *   failoverURL?: string,
     *   fqdnOutboundAuthentication?: FqdnOutboundAuthentication|value-of<FqdnOutboundAuthentication>,
     *   ipAuthenticationMethod?: IPAuthenticationMethod|value-of<IPAuthenticationMethod>,
     *   password?: string,
     *   txtName?: string,
     *   txtTtl?: int,
     *   txtValue?: string,
     *   userName?: string,
     *   webhookURL?: string,
     * }|FqdnAuthenticationPatchAllParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<FqdnAuthenticationPatchAllResponse>
     *
     * @throws APIException
     */
    public function patchAll(
        string $fqdnConnectionID,
        array|FqdnAuthenticationPatchAllParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = FqdnAuthenticationPatchAllParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['fqdn_connections/%1$s/fqdn_authentication', $fqdnConnectionID],
            body: (object) $parsed,
            options: $options,
            convert: FqdnAuthenticationPatchAllResponse::class,
        );
    }
}
