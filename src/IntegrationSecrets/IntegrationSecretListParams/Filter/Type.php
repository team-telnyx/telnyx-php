<?php

declare(strict_types=1);

namespace Telnyx\IntegrationSecrets\IntegrationSecretListParams\Filter;

enum Type: string
{
    case BEARER = 'bearer';

    case BASIC = 'basic';
}
