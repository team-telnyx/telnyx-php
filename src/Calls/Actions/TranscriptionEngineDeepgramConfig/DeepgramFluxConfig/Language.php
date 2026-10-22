<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramFluxConfig;

/**
 * Language to transcribe. `deepgram/flux` supports English only.
 */
enum Language: string
{
    case EN = 'en';
}
