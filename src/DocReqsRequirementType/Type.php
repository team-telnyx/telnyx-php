<?php

declare(strict_types=1);

namespace Telnyx\DocReqsRequirementType;

/**
 * Defines the type of this requirement type.
 */
enum Type: string
{
    case DOCUMENT = 'document';

    case ADDRESS = 'address';

    case TEXTUAL = 'textual';
}
