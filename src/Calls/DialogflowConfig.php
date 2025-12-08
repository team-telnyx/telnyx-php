<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DialogflowConfigShape = array{
 *   analyze_sentiment?: bool|null, partial_automated_agent_reply?: bool|null
 * }
 */
final class DialogflowConfig implements BaseModel
{
    /** @use SdkModel<DialogflowConfigShape> */
    use SdkModel;

    /**
     * Enable sentiment analysis from Dialogflow.
     */
    #[Optional]
    public ?bool $analyze_sentiment;

    /**
     * Enable partial automated agent reply from Dialogflow.
     */
    #[Optional]
    public ?bool $partial_automated_agent_reply;

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
        ?bool $analyze_sentiment = null,
        ?bool $partial_automated_agent_reply = null
    ): self {
        $obj = new self;

        null !== $analyze_sentiment && $obj['analyze_sentiment'] = $analyze_sentiment;
        null !== $partial_automated_agent_reply && $obj['partial_automated_agent_reply'] = $partial_automated_agent_reply;

        return $obj;
    }

    /**
     * Enable sentiment analysis from Dialogflow.
     */
    public function withAnalyzeSentiment(bool $analyzeSentiment): self
    {
        $obj = clone $this;
        $obj['analyze_sentiment'] = $analyzeSentiment;

        return $obj;
    }

    /**
     * Enable partial automated agent reply from Dialogflow.
     */
    public function withPartialAutomatedAgentReply(
        bool $partialAutomatedAgentReply
    ): self {
        $obj = clone $this;
        $obj['partial_automated_agent_reply'] = $partialAutomatedAgentReply;

        return $obj;
    }
}
