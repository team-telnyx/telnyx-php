<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\ConversationInsights\ConversationInsightRetrieveAggregatesParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{assistantID?: string|null}
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    /**
     * Filter by assistant ID (e.g., `metadata.assistant_id=eq.<assistant_id>`). When provided, only conversation insights for the specified assistant are aggregated. Used by the portal to scope the 'Insights Over Time' chart to a single assistant.
     */
    #[Optional('assistant_id')]
    public ?string $assistantID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $assistantID = null): self
    {
        $self = new self;

        null !== $assistantID && $self['assistantID'] = $assistantID;

        return $self;
    }

    /**
     * Filter by assistant ID (e.g., `metadata.assistant_id=eq.<assistant_id>`). When provided, only conversation insights for the specified assistant are aggregated. Used by the portal to scope the 'Insights Over Time' chart to a single assistant.
     */
    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }
}
