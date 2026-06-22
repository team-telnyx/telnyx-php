<?php

declare(strict_types=1);

namespace Telnyx\Dir\Comments\DirComment;

/**
 * Resource the comment is attached to. Always `dir` on this endpoint.
 */
enum EntityType: string
{
    case DIR = 'dir';
}
