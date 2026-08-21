<?php

declare(strict_types=1);

namespace Telnyx\EmailUnsubscribeGroups\EmailUnsubscribeGroupDeleteParams\Force;

enum ForceString: string
{
    case TRUE = 'true';

    case FALSE = 'false';
}
