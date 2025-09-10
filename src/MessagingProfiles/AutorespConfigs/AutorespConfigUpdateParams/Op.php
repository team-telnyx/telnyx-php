<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs\AutorespConfigUpdateParams;

enum Op: string
{
    case START = 'start';

    case STOP = 'stop';

    case INFO = 'info';
}
