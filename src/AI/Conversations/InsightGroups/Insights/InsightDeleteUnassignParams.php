<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups\Insights;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Remove an insight from a group.
 *
 * @see Telnyx\Services\AI\Conversations\InsightGroups\InsightsService::deleteUnassign()
 *
 * @phpstan-type InsightDeleteUnassignParamsShape = array{group_id: string}
 */
final class InsightDeleteUnassignParams implements BaseModel
{
    /** @use SdkModel<InsightDeleteUnassignParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the insight group.
     */
    #[Required]
    public string $group_id;

    /**
     * `new InsightDeleteUnassignParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightDeleteUnassignParams::with(group_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightDeleteUnassignParams)->withGroupID(...)
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
    public static function with(string $group_id): self
    {
        $obj = new self;

        $obj['group_id'] = $group_id;

        return $obj;
    }

    /**
     * The ID of the insight group.
     */
    public function withGroupID(string $groupID): self
    {
        $obj = clone $this;
        $obj['group_id'] = $groupID;

        return $obj;
    }
}
