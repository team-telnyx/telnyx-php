<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineAssemblyaiConfig;

/**
 * The model to use for transcription. `assemblyai/universal-streaming` is a legacy alias of `assemblyai/universal-3-5-pro` and resolves to the same model.
 */
enum TranscriptionModel: string
{
    case ASSEMBLYAI_UNIVERSAL_3_5_PRO = 'assemblyai/universal-3-5-pro';

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';
}
