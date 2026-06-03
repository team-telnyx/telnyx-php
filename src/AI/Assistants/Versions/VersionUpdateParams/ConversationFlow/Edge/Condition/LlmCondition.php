<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\VersionUpdateParams\ConversationFlow\Edge\Condition;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Edge condition evaluated by the LLM from a natural-language prompt.
 *
 * The model is asked to judge the prompt against conversation context and
 * returns true/false. Use this for fuzzy intents that aren't expressible as
 * a deterministic expression (e.g. 'user wants to escalate to a human').
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
     * Natural-language criterion the LLM judges as true/false.
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
     * Natural-language criterion the LLM judges as true/false.
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
