<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionStartRequest\TranscriptionEngineConfig\DeepgramNova2Config;

enum TranscriptionModel: string
{
    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';
}
