<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionAnswerParams\ConversationRelayConfig\VoiceSettings\InworldVoiceSettings;

/**
 * Controls the expressiveness and consistency of the Inworld `TTS2` model's speech synthesis. `STABLE` favors consistent, predictable output, `CREATIVE` allows more expressive variation, and `BALANCED` sits in between. Optional and only supported by `TTS2`; when omitted, the provider default applies.
 */
enum DeliveryMode: string
{
    case STABLE = 'STABLE';

    case BALANCED = 'BALANCED';

    case CREATIVE = 'CREATIVE';
}
