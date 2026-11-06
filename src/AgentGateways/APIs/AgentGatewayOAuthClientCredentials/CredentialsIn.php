<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs\AgentGatewayOAuthClientCredentials;

/**
 * Whether the client ID and secret go in the token request's body or as HTTP Basic authentication.
 */
enum CredentialsIn: string
{
    case BODY = 'body';

    case BASIC = 'basic';
}
