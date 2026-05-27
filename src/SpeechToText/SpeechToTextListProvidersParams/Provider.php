<?php

declare(strict_types=1);

namespace Telnyx\SpeechToText\SpeechToTextListProvidersParams;

/**
 * Filter to entries for a specific STT provider. The enum mirrors the providers advertised across the speech-to-text spec (including `google` and `telnyx`, which are accepted as WebSocket transcription engines). A provider that has no models currently registered for any service type will return an empty `data` array rather than an error.
 */
enum Provider: string
{
    case DEEPGRAM = 'deepgram';

    case SPEECHMATICS = 'speechmatics';

    case ASSEMBLYAI = 'assemblyai';

    case XAI = 'xai';

    case SONIOX = 'soniox';

    case AZURE = 'azure';

    case OPENAI = 'openai';

    case GOOGLE = 'google';

    case TELNYX = 'telnyx';
}
