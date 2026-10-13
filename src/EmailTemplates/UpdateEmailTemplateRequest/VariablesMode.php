<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\UpdateEmailTemplateRequest;

/**
 * Controls how `variables` is maintained. Setting `automatic` re-extracts immediately from the effective subject, HTML body, and text body and rejects a simultaneous non-null array. Setting `explicit` requires the exact non-null array, including valid `[]`. With the mode omitted, a non-null array selects explicit mode, null selects automatic mode, and omitting both fields preserves the current mode. Source-content changes re-extract only in automatic mode.
 */
enum VariablesMode: string
{
    case AUTOMATIC = 'automatic';

    case EXPLICIT = 'explicit';
}
