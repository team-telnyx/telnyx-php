<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\InferenceEmbeddingVoiceSettings\ToolCallAudio\UnionMember1;

/**
 * Provide a direct URL to an MP3 file. The audio loops while the tool runs.
 */
enum Type: string
{
    case MEDIA_URL = 'media_url';
}
