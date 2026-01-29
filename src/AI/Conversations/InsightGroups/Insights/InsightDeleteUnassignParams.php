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
 * @phpstan-type InsightDeleteUnassignParamsShape = array{groupID: string}
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
    public string $groupID;

    /**
     * `new InsightDeleteUnassignParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightDeleteUnassignParams::with(groupID: ...)
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
    public static function with(string $groupID): self
    {
        $self = new self;

        $self['groupID'] = $groupID;

        return $self;
    }

    /**
     * The ID of the insight group.
     */
    public function withGroupID(string $groupID): self
    {
        $self = clone $this;
        $self['groupID'] = $groupID;

        return $self;
    }
}
