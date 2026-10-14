<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\EmailTemplateListParams;

/**
 * Exact match on the template's `autoescape` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
 */
enum FilterAutoescape: string
{
    case TRUE = 'true';

    case FALSE = 'false';
}
