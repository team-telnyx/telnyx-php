<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Spend;

enum SpendGroupBy: string
{
    case TOKEN_GROUP = 'token_group';

    case TOKEN_USER = 'token_user';

    case TOKEN_KEY = 'token_key';

    case END_USER = 'end_user';
}
