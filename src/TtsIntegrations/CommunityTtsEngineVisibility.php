<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

/**
 * `private`: only your organization can use the engine. `public`: any organization can, once it is `active`.
 */
enum CommunityTtsEngineVisibility: string
{
    case PRIVATE = 'private';

    case PUBLIC = 'public';
}
