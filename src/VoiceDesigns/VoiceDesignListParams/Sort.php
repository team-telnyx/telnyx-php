<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns\VoiceDesignListParams;

/**
 * Sort order. Prefix with `-` for descending. Defaults to `-created_at`.
 */
enum Sort: string
{
    case NAME = 'name';

    case NAME_DESC = '-name';

    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';
}
