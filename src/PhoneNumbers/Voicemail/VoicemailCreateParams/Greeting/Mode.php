<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voicemail\VoicemailCreateParams\Greeting;

/**
 * The greeting mode. `default` plays the standard system greeting. `custom_greeting` plays the audio referenced by `media_name`.
 */
enum Mode: string
{
    case DEFAULT = 'default';

    case CUSTOM_GREETING = 'custom_greeting';
}
