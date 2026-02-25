<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartAIAssistantParams\VoiceSettings\AzureVoiceSettings;

/**
 * Voice gender filter.
 */
enum Gender: string
{
    case MALE = 'Male';

    case FEMALE = 'Female';
}
