<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a new insight group.
 *
 * @see Telnyx\Services\AI\Conversations\InsightGroupsService::insightGroups()
 *
 * @phpstan-type InsightGroupInsightGroupsParamsShape = array{
 *   name: string, description?: string|null, webhook?: string|null
 * }
 */
final class InsightGroupInsightGroupsParams implements BaseModel
{
    /** @use SdkModel<InsightGroupInsightGroupsParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $description;

    #[Optional]
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
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $webhook && $self['webhook'] = $webhook;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withWebhook(string $webhook): self
    {
        $self = clone $this;
        $self['webhook'] = $webhook;

        return $self;
    }
}
