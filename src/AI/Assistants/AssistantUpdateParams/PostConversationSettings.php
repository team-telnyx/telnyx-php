<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantUpdateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Configuration for post-conversation processing. When enabled, the assistant receives one additional LLM turn after the conversation ends, allowing it to execute tool calls such as logging to a CRM or sending a summary. The assistant can execute multiple parallel or sequential tools during this phase. Telephony-control tools (e.g. hangup, transfer) are unavailable post-conversation. Beta feature.
 *
 * @phpstan-type PostConversationSettingsShape = array{enabled?: bool|null}
 */
final class PostConversationSettings implements BaseModel
{
    /** @use SdkModel<PostConversationSettingsShape> */
    use SdkModel;

    /**
     * Whether post-conversation processing is enabled. When true, the assistant will be invoked after the conversation ends to perform any final tool calls. Defaults to false.
     */
    #[Optional]
    public ?bool $enabled;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $enabled = null): self
    {
        $self = new self;

        null !== $enabled && $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Whether post-conversation processing is enabled. When true, the assistant will be invoked after the conversation ends to perform any final tool calls. Defaults to false.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }
}
