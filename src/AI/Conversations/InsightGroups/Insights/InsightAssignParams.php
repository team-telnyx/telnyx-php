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
 * @see Telnyx\STAINLESS_FIXME_AI\STAINLESS_FIXME_Conversations\STAINLESS_FIXME_InsightGroups\InsightsService::assign()
 *
 * @phpstan-type InsightAssignParamsShape = array{group_id: string}
 */
final class InsightAssignParams implements BaseModel
{
    /** @use SdkModel<InsightAssignParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the insight group.
     */
    #[Api]
    public string $group_id;

    /**
     * `new InsightAssignParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightAssignParams::with(group_id: ...)
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
    public static function with(string $group_id): self
    {
        $obj = new self;

        $obj->group_id = $group_id;

        return $obj;
    }

    /**
     * The ID of the insight group.
     */
    public function withGroupID(string $groupID): self
    {
        $obj = clone $this;
        $obj->group_id = $groupID;

        return $obj;
    }
}
