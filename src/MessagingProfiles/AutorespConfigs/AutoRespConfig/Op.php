<?php

declare(strict_types=1);

namespace Telnyx\MessagingProfiles\AutorespConfigs\AutoRespConfig;

enum Op: string
{
    case START = 'start';

    case STOP = 'stop';

    case INFO = 'info';
}
