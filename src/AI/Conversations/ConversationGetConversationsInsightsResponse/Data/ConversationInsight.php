<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationGetConversationsInsightsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationInsightShape = array{
 *   insightID: string, result: string
 * }
 */
final class ConversationInsight implements BaseModel
{
    /** @use SdkModel<ConversationInsightShape> */
    use SdkModel;

    /**
     * Unique identifier for the insight configuration.
     */
    #[Api('insight_id')]
    public string $insightID;

    /**
     * Insight result from the conversation. If the insight has a JSON schema, this will be stringified JSON object.
     */
    #[Api]
    public string $result;

    /**
     * `new ConversationInsight()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationInsight::with(insightID: ..., result: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationInsight)->withInsightID(...)->withResult(...)
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
    public static function with(string $insightID, string $result): self
    {
        $obj = new self;

        $obj->insightID = $insightID;
        $obj->result = $result;

        return $obj;
    }

    /**
     * Unique identifier for the insight configuration.
     */
    public function withInsightID(string $insightID): self
    {
        $obj = clone $this;
        $obj->insightID = $insightID;

        return $obj;
    }

    /**
     * Insight result from the conversation. If the insight has a JSON schema, this will be stringified JSON object.
     */
    public function withResult(string $result): self
    {
        $obj = clone $this;
        $obj->result = $result;

        return $obj;
    }
}
