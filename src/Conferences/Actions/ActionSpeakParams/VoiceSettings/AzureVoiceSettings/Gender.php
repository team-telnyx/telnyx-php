<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions\ActionSpeakParams\VoiceSettings\AzureVoiceSettings;

/**
 * Voice gender filter.
 */
enum Gender: string
{
    case MALE = 'Male';

    case FEMALE = 'Female';
}
