<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\Language;

/**
 * Engine to use for speech recognition. Legacy values `A` - `Google`, `B` - `Telnyx` are supported for backward compatibility. When provided in a Conversation Relay language entry, Telnyx derives `transcription_provider` and `speech_model` for that language.
 */
enum TranscriptionEngine: string
{
    case GOOGLE = 'Google';

    case TELNYX = 'Telnyx';

    case DEEPGRAM = 'Deepgram';

    case AZURE = 'Azure';

    case X_AI = 'xAI';

    case ASSEMBLY_AI = 'AssemblyAI';

    case SPEECHMATICS = 'Speechmatics';

    case SONIOX = 'Soniox';

    case A = 'A';

    case B = 'B';
}
