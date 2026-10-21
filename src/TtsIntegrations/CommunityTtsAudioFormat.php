<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

/**
 * An audio format an engine can produce. Offer `linear16`: it serves every surface. Telnyx converts `linear16` to MP3 for the commands that play MP3.
 */
enum CommunityTtsAudioFormat: string
{
    case MP3 = 'mp3';

    case LINEAR16 = 'linear16';

    case WAV = 'wav';

    case MULAW = 'mulaw';

    case ALAW = 'alaw';

    case OGG_VORBIS = 'ogg_vorbis';
}
