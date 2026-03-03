<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\DeepgramNova3Config;

enum TranscriptionEngine: string
{
    case DEEPGRAM_NOVA_3 = 'deepgram/nova-3';
}
