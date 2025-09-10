<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionGatherUsingSpeakParams;

/**
 * The type of the provided payload. The payload can either be plain text, or Speech Synthesis Markup Language (SSML).
 */
enum PayloadType: string
{
    case TEXT = 'text';

    case SSML = 'ssml';
}
