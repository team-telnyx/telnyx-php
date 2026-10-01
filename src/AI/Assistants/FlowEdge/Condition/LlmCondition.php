<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\FlowEdge\Condition;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edge condition routed by the assistant's LLM from a natural-language
 * prompt.
 *
 * How the edge is decided depends on the channel. On calls, each outgoing
 * `llm` condition is offered to the assistant's model as a transition tool
 * alongside the assistant's tools, and the edge fires when the model
 * selects it; the platform does not evaluate the prompt itself, and
 * instructions that forbid or discourage tool calls can stop these edges
 * from firing. On chat channels, the edge prompts are evaluated in a
 * separate model call after the reply, which does not use the assistant's
 * instructions. Use this for fuzzy intents that aren't expressible as a
 * deterministic expression (e.g. 'user wants to escalate to a human').
 *
 * @phpstan-type LlmConditionShape = array{prompt: string, type: 'llm'}
 */
final class LlmCondition implements BaseModel
{
    /** @use SdkModel<LlmConditionShape> */
    use SdkModel;

    /** @var 'llm' $type */
    #[Required]
    public string $type = 'llm';

    /**
     * Natural-language criterion the model routes on. On calls this is offered to the model as the transition tool's description; on chat channels it is judged as a statement in the post-reply evaluation call.
     */
    #[Required]
    public string $prompt;

    /**
     * `new LlmCondition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * LlmCondition::with(prompt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new LlmCondition)->withPrompt(...)
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
     */
    public static function with(string $prompt): self
    {
        $self = new self;

        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * Natural-language criterion the model routes on. On calls this is offered to the model as the transition tool's description; on chat channels it is judged as a statement in the post-reply evaluation call.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * @param 'llm' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
