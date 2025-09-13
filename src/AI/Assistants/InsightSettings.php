<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type insight_settings = array{insightGroupID?: string}
 */
final class InsightSettings implements BaseModel
{
    /** @use SdkModel<insight_settings> */
    use SdkModel;

    /**
     * Reference to an Insight Group. Insights in this group will be run automatically for all the assistant's conversations.
     */
    #[Api('insight_group_id', optional: true)]
    public ?string $insightGroupID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $insightGroupID = null): self
    {
        $obj = new self;

        null !== $insightGroupID && $obj->insightGroupID = $insightGroupID;

        return $obj;
    }

    /**
     * Reference to an Insight Group. Insights in this group will be run automatically for all the assistant's conversations.
     */
    public function withInsightGroupID(string $insightGroupID): self
    {
        $obj = clone $this;
        $obj->insightGroupID = $insightGroupID;

        return $obj;
    }
}
