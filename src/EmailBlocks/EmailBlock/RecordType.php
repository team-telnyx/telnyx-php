<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlock;

/**
 * View-only discriminator.
 */
enum RecordType: string
{
    case EMAIL_BLOCK = 'email_block';
}
