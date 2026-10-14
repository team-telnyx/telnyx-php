<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\EmailTemplateCreateParams;

/**
 * Controls how `variables` is maintained. If both fields are omitted (or `variables` is null), the template uses `automatic` mode and extracts variable names from the effective subject, HTML body, and text body. A non-null `variables` array with no mode selects `explicit`. `automatic` rejects a simultaneous non-null array; `explicit` requires a non-null array, including valid `[]`, and preserves its exact order, duplicates, and string contents.
 */
enum VariablesMode: string
{
    case AUTOMATIC = 'automatic';

    case EXPLICIT = 'explicit';
}
