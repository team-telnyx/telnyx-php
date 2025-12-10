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
 *   aiAssistants: list<AIAssistant>, voiceMode?: value-of<VoiceMode>|null
 * }
 */
final class Handoff implements BaseModel
{
    /** @use SdkModel<HandoffShape> */
    use SdkModel;

    /**
     * List of possible assistants that can receive a handoff.
     *
     * @var list<AIAssistant> $aiAssistants
     */
    #[Required('ai_assistants', list: AIAssistant::class)]
    public array $aiAssistants;

    /**
     * With the unified voice mode all assistants share the same voice, making the handoff transparent to the user. With the distinct voice mode all assistants retain their voice configuration, providing the experience of a conference call with a team of assistants.
     *
     * @var value-of<VoiceMode>|null $voiceMode
     */
    #[Optional('voice_mode', enum: VoiceMode::class)]
    public ?string $voiceMode;

    /**
     * `new Handoff()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Handoff::with(aiAssistants: ...)
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
     * @param list<AIAssistant|array{id: string, name: string}> $aiAssistants
     * @param VoiceMode|value-of<VoiceMode> $voiceMode
     */
    public static function with(
        array $aiAssistants,
        VoiceMode|string|null $voiceMode = null
    ): self {
        $self = new self;

        $self['aiAssistants'] = $aiAssistants;

        null !== $voiceMode && $self['voiceMode'] = $voiceMode;

        return $self;
    }

    /**
     * List of possible assistants that can receive a handoff.
     *
     * @param list<AIAssistant|array{id: string, name: string}> $aiAssistants
     */
    public function withAIAssistants(array $aiAssistants): self
    {
        $self = clone $this;
        $self['aiAssistants'] = $aiAssistants;

        return $self;
    }

    /**
     * With the unified voice mode all assistants share the same voice, making the handoff transparent to the user. With the distinct voice mode all assistants retain their voice configuration, providing the experience of a conference call with a team of assistants.
     *
     * @param VoiceMode|value-of<VoiceMode> $voiceMode
     */
    public function withVoiceMode(VoiceMode|string $voiceMode): self
    {
        $self = clone $this;
        $self['voiceMode'] = $voiceMode;

        return $self;
    }
}
