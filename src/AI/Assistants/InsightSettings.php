<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type InsightSettingsShape = array{insight_group_id?: string|null}
 */
final class InsightSettings implements BaseModel
{
    /** @use SdkModel<InsightSettingsShape> */
    use SdkModel;

    /**
     * Reference to an Insight Group. Insights in this group will be run automatically for all the assistant's conversations.
     */
    #[Optional]
    public ?string $insight_group_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $insight_group_id = null): self
    {
        $obj = new self;

        null !== $insight_group_id && $obj['insight_group_id'] = $insight_group_id;

        return $obj;
    }

    /**
     * Reference to an Insight Group. Insights in this group will be run automatically for all the assistant's conversations.
     */
    public function withInsightGroupID(string $insightGroupID): self
    {
        $obj = clone $this;
        $obj['insight_group_id'] = $insightGroupID;

        return $obj;
    }
}
