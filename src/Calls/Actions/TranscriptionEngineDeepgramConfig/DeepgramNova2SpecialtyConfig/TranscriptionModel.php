<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\TranscriptionEngineDeepgramConfig\DeepgramNova2SpecialtyConfig;

enum TranscriptionModel: string
{
    case DEEPGRAM_NOVA_2_MEDICAL = 'deepgram/nova-2-medical';

    case DEEPGRAM_NOVA_2_PHONECALL = 'deepgram/nova-2-phonecall';
}
