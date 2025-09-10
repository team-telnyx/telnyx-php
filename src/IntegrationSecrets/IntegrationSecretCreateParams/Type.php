<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets\IntegrationSecretCreateParams;

/**
 * The type of secret.
 */
enum Type: string
{
    case BEARER = 'bearer';

    case BASIC = 'basic';
}
