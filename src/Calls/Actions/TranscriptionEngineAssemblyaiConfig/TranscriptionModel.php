<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineAssemblyaiConfig;

/**
 * The model to use for transcription. `assemblyai/universal-3-6-pro` is the AssemblyAI Universal-3.6 Pro model. `assemblyai/universal-3-5-pro` (the default) and `assemblyai/universal-streaming` are legacy aliases that run the same Universal-3.6 Pro model.
 */
enum TranscriptionModel: string
{
    case ASSEMBLYAI_UNIVERSAL_3_6_PRO = 'assemblyai/universal-3-6-pro';

    case ASSEMBLYAI_UNIVERSAL_3_5_PRO = 'assemblyai/universal-3-5-pro';

    case ASSEMBLYAI_UNIVERSAL_STREAMING = 'assemblyai/universal-streaming';
}
