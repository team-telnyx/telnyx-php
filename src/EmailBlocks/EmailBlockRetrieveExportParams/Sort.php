<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks\EmailBlockRetrieveExportParams;

/**
 * Sort field. Leading `-` = desc; only `created_at` is sortable. Default `-created_at`. `--` is an error.
 */
enum Sort: string
{
    case CREATED_AT = 'created_at';

    case CREATED_AT_DESC = '-created_at';
}
