<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\Handoff\Handoff;

/**
 * With the unified voice mode all assistants share the same voice, making the handoff transparent to the user. With the distinct voice mode all assistants retain their voice configuration, providing the experience of a conference call with a team of assistants.
 */
enum VoiceMode: string
{
    case UNIFIED = 'unified';

    case DISTINCT = 'distinct';
}
