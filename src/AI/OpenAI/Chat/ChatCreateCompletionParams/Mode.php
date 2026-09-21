<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Chat\ChatCreateCompletionParams;

/**
 * How strictly `region` is applied. `preferred` (the default when `region` is set) tries that region first and falls back to another when the model cannot be served there, so a request that would have succeeded still succeeds. `strict` pins the request: it is served from that region or it fails with a 422, never redirected to another region. Requires `region`.
 */
enum Mode: string
{
    case PREFERRED = 'preferred';

    case STRICT = 'strict';
}
