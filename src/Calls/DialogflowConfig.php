<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DialogflowConfigShape = array{
 *   analyzeSentiment?: bool|null, partialAutomatedAgentReply?: bool|null
 * }
 */
final class DialogflowConfig implements BaseModel
{
    /** @use SdkModel<DialogflowConfigShape> */
    use SdkModel;

    /**
     * Enable sentiment analysis from Dialogflow.
     */
    #[Optional('analyze_sentiment')]
    public ?bool $analyzeSentiment;

    /**
     * Enable partial automated agent reply from Dialogflow.
     */
    #[Optional('partial_automated_agent_reply')]
    public ?bool $partialAutomatedAgentReply;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $analyzeSentiment = null,
        ?bool $partialAutomatedAgentReply = null
    ): self {
        $self = new self;

        null !== $analyzeSentiment && $self['analyzeSentiment'] = $analyzeSentiment;
        null !== $partialAutomatedAgentReply && $self['partialAutomatedAgentReply'] = $partialAutomatedAgentReply;

        return $self;
    }

    /**
     * Enable sentiment analysis from Dialogflow.
     */
    public function withAnalyzeSentiment(bool $analyzeSentiment): self
    {
        $self = clone $this;
        $self['analyzeSentiment'] = $analyzeSentiment;

        return $self;
    }

    /**
     * Enable partial automated agent reply from Dialogflow.
     */
    public function withPartialAutomatedAgentReply(
        bool $partialAutomatedAgentReply
    ): self {
        $self = clone $this;
        $self['partialAutomatedAgentReply'] = $partialAutomatedAgentReply;

        return $self;
    }
}
