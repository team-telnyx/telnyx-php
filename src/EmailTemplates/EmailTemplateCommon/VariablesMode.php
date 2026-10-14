<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\EmailTemplateCommon;

/**
 * `automatic` when variable names are derived from template content; `explicit` when `variables` is the exact manually managed array.
 */
enum VariablesMode: string
{
    case AUTOMATIC = 'automatic';

    case EXPLICIT = 'explicit';
}
