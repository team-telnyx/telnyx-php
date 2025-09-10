<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups\Insights;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new InsightDeleteUnassignParams); // set properties as needed
 * $client->ai.conversations.insightGroups.insights->deleteUnassign(...$params->toArray());
 * ```
 * Remove an insight from a group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.conversations.insightGroups.insights->deleteUnassign(...$params->toArray());`
 *
 * @see Telnyx\AI\Conversations\InsightGroups\Insights->deleteUnassign
 *
 * @phpstan-type insight_delete_unassign_params = array{groupID: string}
 */
final class InsightDeleteUnassignParams implements BaseModel
{
    /** @use SdkModel<insight_delete_unassign_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The ID of the insight group.
     */
    #[Api]
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
