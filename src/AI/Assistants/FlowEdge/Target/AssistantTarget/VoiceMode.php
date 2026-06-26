<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowEdge\Target\AssistantTarget;

/**
 * Voice behavior when handing off to the target assistant, mirroring the handoff tool's `voice_mode`. `unified` (default) keeps the current voice across the handoff; `distinct` lets the target assistant speak with its own configured voice. Only applies to assistant targets — node targets override voice via the node's own `voice_settings`.
 */
enum VoiceMode: string
{
    case UNIFIED = 'unified';

    case DISTINCT = 'distinct';
}
