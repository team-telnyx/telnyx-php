<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool\HandoffTool;

use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff\AIAssistant;
use Telnyx\AI\Assistants\AssistantTool\HandoffTool\Handoff\VoiceMode;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type handoff_alias = array{
 *   aiAssistants: list<AIAssistant>, voiceMode?: value-of<VoiceMode>
 * }
 */
final class Handoff implements BaseModel
{
    /** @use SdkModel<handoff_alias> */
    use SdkModel;

    /**
     * List of possible assistants that can receive a handoff.
     *
     * @var list<AIAssistant> $aiAssistants
     */
    #[Api('ai_assistants', list: AIAssistant::class)]
    public array $aiAssistants;

    /**
     * With the unified voice mode all assistants share the same voice, making the handoff transparent to the user. With the distinct voice mode all assistants retain their voice configuration, providing the experience of a conference call with a team of assistants.
     *
     * @var value-of<VoiceMode>|null $voiceMode
     */
    #[Api('voice_mode', enum: VoiceMode::class, optional: true)]
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
     * @param list<AIAssistant> $aiAssistants
     * @param VoiceMode|value-of<VoiceMode> $voiceMode
     */
    public static function with(
        array $aiAssistants,
        VoiceMode|string|null $voiceMode = null
    ): self {
        $obj = new self;

        $obj->aiAssistants = $aiAssistants;

        null !== $voiceMode && $obj['voiceMode'] = $voiceMode;

        return $obj;
    }

    /**
     * List of possible assistants that can receive a handoff.
     *
     * @param list<AIAssistant> $aiAssistants
     */
    public function withAIAssistants(array $aiAssistants): self
    {
        $obj = clone $this;
        $obj->aiAssistants = $aiAssistants;

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
        $obj['voiceMode'] = $voiceMode;

        return $obj;
    }
}
