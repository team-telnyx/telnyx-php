<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova3Config;

enum TranscriptionModel: string
{
    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';
}
