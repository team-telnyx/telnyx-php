<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type dialogflow_config = array{
 *   analyzeSentiment?: bool|null, partialAutomatedAgentReply?: bool|null
 * }
 */
final class DialogflowConfig implements BaseModel
{
    /** @use SdkModel<dialogflow_config> */
    use SdkModel;

    /**
     * Enable sentiment analysis from Dialogflow.
     */
    #[Api('analyze_sentiment', optional: true)]
    public ?bool $analyzeSentiment;

    /**
     * Enable partial automated agent reply from Dialogflow.
     */
    #[Api('partial_automated_agent_reply', optional: true)]
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
        $obj = new self;

        null !== $analyzeSentiment && $obj->analyzeSentiment = $analyzeSentiment;
        null !== $partialAutomatedAgentReply && $obj->partialAutomatedAgentReply = $partialAutomatedAgentReply;

        return $obj;
    }

    /**
     * Enable sentiment analysis from Dialogflow.
     */
    public function withAnalyzeSentiment(bool $analyzeSentiment): self
    {
        $obj = clone $this;
        $obj->analyzeSentiment = $analyzeSentiment;

        return $obj;
    }

    /**
     * Enable partial automated agent reply from Dialogflow.
     */
    public function withPartialAutomatedAgentReply(
        bool $partialAutomatedAgentReply
    ): self {
        $obj = clone $this;
        $obj->partialAutomatedAgentReply = $partialAutomatedAgentReply;

        return $obj;
    }
}
