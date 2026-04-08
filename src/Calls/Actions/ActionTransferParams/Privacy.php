<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionTransferParams;

/**
 * Indicates the privacy level to be used for the call. When set to `id`, caller ID information (name and number) will be hidden from the called party. When set to `none` or omitted, caller ID will be shown normally.
 */
enum Privacy: string
{
    case ID = 'id';

    case NONE = 'none';
}
