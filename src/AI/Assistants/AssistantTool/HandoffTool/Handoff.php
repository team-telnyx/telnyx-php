<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\HandoffTool;

use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff\AIAssistant;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff\VoiceMode;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type HandoffShape = array{
 *   ai_assistants: list<AIAssistant>, voice_mode?: value-of<VoiceMode>|null
 * }
 */
final class Handoff implements BaseModel
{
    /** @use SdkModel<HandoffShape> */
    use SdkModel;

    /**
     * List of possible assistants that can receive a handoff.
     *
     * @var list<AIAssistant> $ai_assistants
     */
    #[Required(list: AIAssistant::class)]
    public array $ai_assistants;

    /**
     * With the unified voice mode all assistants share the same voice, making the handoff transparent to the user. With the distinct voice mode all assistants retain their voice configuration, providing the experience of a conference call with a team of assistants.
     *
     * @var value-of<VoiceMode>|null $voice_mode
     */
    #[Optional(enum: VoiceMode::class)]
    public ?string $voice_mode;

    /**
     * `new Handoff()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Handoff::with(ai_assistants: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Handoff)->withAIAssistants(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AIAssistant|array{id: string, name: string}> $ai_assistants
     * @param VoiceMode|value-of<VoiceMode> $voice_mode
     */
    public static function with(
        array $ai_assistants,
        VoiceMode|string|null $voice_mode = null
    ): self {
        $obj = new self;

        $obj['ai_assistants'] = $ai_assistants;

        null !== $voice_mode && $obj['voice_mode'] = $voice_mode;

        return $obj;
    }

    /**
     * List of possible assistants that can receive a handoff.
     *
     * @param list<AIAssistant|array{id: string, name: string}> $aiAssistants
     */
    public function withAIAssistants(array $aiAssistants): self
    {
        $obj = clone $this;
        $obj['ai_assistants'] = $aiAssistants;

        return $obj;
    }

    /**
     * With the unified voice mode all assistants share the same voice, making the handoff transparent to the user. With the distinct voice mode all assistants retain their voice configuration, providing the experience of a conference call with a team of assistants.
     *
     * @param VoiceMode|value-of<VoiceMode> $voiceMode
     */
    public function withVoiceMode(VoiceMode|string $voiceMode): self
    {
        $obj = clone $this;
        $obj['voice_mode'] = $voiceMode;

        return $obj;
    }
}
