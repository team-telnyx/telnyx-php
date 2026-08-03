<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlock;

enum Source: string
{
    case FEEDBACK = 'feedback';

    case MANUAL = 'manual';

    case IMPORT = 'import';

    case SYSTEM = 'system';
}
