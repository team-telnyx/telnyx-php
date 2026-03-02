<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\InviteTool\Invite\VoicemailDetection\OnVoicemailDetected;

/**
 * The action to take when voicemail is detected.
 */
enum Action: string
{
    case STOP_INVITE = 'stop_invite';
}
