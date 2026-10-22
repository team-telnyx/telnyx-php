<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallAnalyzedWebhookEvent\Data\Payload\ConversationInsight;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConversationInsightShape = array{
 *   insightID?: string|null, result?: string|null
 * }
 */
final class ConversationInsight implements BaseModel
{
    /** @use SdkModel<ConversationInsightShape> */
    use SdkModel;

    /**
     * Identifier of the insight template the result was generated from.
     */
    #[Optional('insight_id')]
    public ?string $insightID;

    /**
     * The generated insight result.
     */
    #[Optional]
    public ?string $result;

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
        ?string $insightID = null,
        ?string $result = null
    ): self {
        $self = new self;

        null !== $insightID && $self['insightID'] = $insightID;
        null !== $result && $self['result'] = $result;

        return $self;
    }

    /**
     * Identifier of the insight template the result was generated from.
     */
    public function withInsightID(string $insightID): self
    {
        $self = clone $this;
        $self['insightID'] = $insightID;

        return $self;
    }

    /**
     * The generated insight result.
     */
    public function withResult(string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }
}
