<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\DeepgramNova2Config;

enum TranscriptionEngine: string
{
    case DEEPGRAM_NOVA_2 = 'deepgram/nova-2';
}
