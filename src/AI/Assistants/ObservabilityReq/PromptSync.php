<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ObservabilityReq;

/**
 * Whether to auto-publish the assistant's instructions as a Langfuse prompt.
 *
 * When ENABLED + prompt_name set, every assistant create/update pushes
 * `instructions` to Langfuse via create_prompt and stores the returned
 * version in prompt_version.
 */
enum PromptSync: string
{
    case ENABLED = 'enabled';

    case DISABLED = 'disabled';
}
