<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\APIs\AgentGatewayStaticAuth;

/**
 * How the credential is sent: `api_key` as `X-API-Key: <value>`, `bearer_token` as `Authorization: Bearer <value>`, `basic` as `Authorization: Basic <base64 of value>` with `value` in the form `user:password`, `token` as `Authorization: token <value>`, and `authorization` as `Authorization: <value>`.
 */
enum Type: string
{
    case API_KEY = 'api_key';

    case BEARER_TOKEN = 'bearer_token';

    case BASIC = 'basic';

    case TOKEN = 'token';

    case AUTHORIZATION = 'authorization';
}
