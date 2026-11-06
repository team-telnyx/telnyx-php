<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs\APICreateParams;

use Telnyx\AgentGateways\APIs\AgentGatewayNoAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;
use Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth;
use Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;
use Telnyx\Core\Concerns\SdkUnion;
use Telnyx\Core\Conversion\Contracts\Converter;
use Telnyx\Core\Conversion\Contracts\ConverterSource;

/**
 * How the gateway authenticates to the API. AWS Signature Version 4 is for MCP servers only. Replaced whole on an update.
 *
 * @phpstan-import-type AgentGatewayNoAuthShape from \Telnyx\AgentGateways\APIs\AgentGatewayNoAuth
 * @phpstan-import-type AgentGatewayStaticAuthShape from \Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth
 * @phpstan-import-type AgentGatewayOAuthClientCredentialsShape from \Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials
 * @phpstan-import-type AgentGatewayPassthroughAuthShape from \Telnyx\AgentGateways\APIs\AgentGatewayPassthroughAuth
 *
 * @phpstan-type AuthVariants = AgentGatewayNoAuth|AgentGatewayStaticAuth|AgentGatewayOAuthClientCredentials|AgentGatewayPassthroughAuth
 * @phpstan-type AuthShape = AuthVariants|AgentGatewayNoAuthShape|AgentGatewayStaticAuthShape|AgentGatewayOAuthClientCredentialsShape|AgentGatewayPassthroughAuthShape
 */
final class Auth implements ConverterSource
{
    use SdkUnion;

    /**
     * @return list<string|Converter|ConverterSource>|array<string,string|Converter|ConverterSource>
     */
    public static function variants(): array
    {
        return [
            AgentGatewayNoAuth::class,
            AgentGatewayStaticAuth::class,
            AgentGatewayOAuthClientCredentials::class,
            AgentGatewayPassthroughAuth::class,
        ];
    }
}
