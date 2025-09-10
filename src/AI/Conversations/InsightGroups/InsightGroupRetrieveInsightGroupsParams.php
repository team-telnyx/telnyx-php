<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\AI\Conversations\InsightGroups\InsightGroupRetrieveInsightGroupsParams\Page;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new InsightGroupRetrieveInsightGroupsParams); // set properties as needed
 * $client->ai.conversations.insightGroups->retrieveInsightGroups(...$params->toArray());
 * ```
 * Get all insight groups.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.conversations.insightGroups->retrieveInsightGroups(...$params->toArray());`
 *
 * @see Telnyx\AI\Conversations\InsightGroups->retrieveInsightGroups
 *
 * @phpstan-type insight_group_retrieve_insight_groups_params = array{page?: Page}
 */
final class InsightGroupRetrieveInsightGroupsParams implements BaseModel
{
    /** @use SdkModel<insight_group_retrieve_insight_groups_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    #[Api(optional: true)]
    public ?Page $page;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Page $page = null): self
    {
        $obj = new self;

        null !== $page && $obj->page = $page;

        return $obj;
    }

    /**
     * Consolidated page parameter (deepObject style). Originally: page[number], page[size].
     */
    public function withPage(Page $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }
}
