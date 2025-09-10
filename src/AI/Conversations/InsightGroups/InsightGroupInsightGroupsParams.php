<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new InsightGroupInsightGroupsParams); // set properties as needed
 * $client->ai.conversations.insightGroups->insightGroups(...$params->toArray());
 * ```
 * Create a new insight group.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.conversations.insightGroups->insightGroups(...$params->toArray());`
 *
 * @see Telnyx\AI\Conversations\InsightGroups->insightGroups
 *
 * @phpstan-type insight_group_insight_groups_params = array{
 *   name: string, description?: string, webhook?: string
 * }
 */
final class InsightGroupInsightGroupsParams implements BaseModel
{
    /** @use SdkModel<insight_group_insight_groups_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $description;

    #[Api(optional: true)]
    public ?string $webhook;

    /**
     * `new InsightGroupInsightGroupsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InsightGroupInsightGroupsParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InsightGroupInsightGroupsParams)->withName(...)
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
    public static function with(
        string $name,
        ?string $description = null,
        ?string $webhook = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $description && $obj->description = $description;
        null !== $webhook && $obj->webhook = $webhook;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    public function withWebhook(string $webhook): self
    {
        $obj = clone $this;
        $obj->webhook = $webhook;

        return $obj;
    }
}
