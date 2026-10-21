<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineSpeechmaticsConfig;

/**
 * The model to use for transcription. `speechmatics/linden-1` is a preview, vendor-hosted model with its own language support (see `language`).
 */
enum TranscriptionModel: string
{
    case SPEECHMATICS_STANDARD = 'speechmatics/standard';

    case SPEECHMATICS_LINDEN_1 = 'speechmatics/linden-1';
}
