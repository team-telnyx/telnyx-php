<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\AwsVoiceSettings;

/**
 * Voice settings provider type.
 */
enum Type: string
{
    case AWS = 'aws';
}
