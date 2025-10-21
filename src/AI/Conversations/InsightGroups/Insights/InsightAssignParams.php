<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups\Insights;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Assign an insight to a group.
 *
 * @see Telnyx\AI\Conversations\InsightGroups\Insights->assign
 *
 * @phpstan-type insight_assign_params = array{groupID: string}
 */
final class InsightAssignParams implements BaseModel
{
    /** @use SdkModel<insight_assign_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the insight group.
     */
    #[Api]
    public string $groupID;

    /**
     * `new InsightAssignParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightAssignParams::with(groupID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightAssignParams)->withGroupID(...)
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
    public static function with(string $groupID): self
    {
        $obj = new self;

        $obj->groupID = $groupID;

        return $obj;
    }

    /**
     * The ID of the insight group.
     */
    public function withGroupID(string $groupID): self
    {
        $obj = clone $this;
        $obj->groupID = $groupID;

        return $obj;
    }
}
