<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations\InsightGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update an insight template group.
 *
 * @see Telnyx\Services\AI\Conversations\InsightGroupsService::update()
 *
 * @phpstan-type InsightGroupUpdateParamsShape = array{
 *   description?: string, name?: string, webhook?: string
 * }
 */
final class InsightGroupUpdateParams implements BaseModel
{
    /** @use SdkModel<InsightGroupUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $webhook;

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
        ?string $description = null,
        ?string $name = null,
        ?string $webhook = null
    ): self {
        $obj = new self;

        null !== $description && $obj['description'] = $description;
        null !== $name && $obj['name'] = $name;
        null !== $webhook && $obj['webhook'] = $webhook;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withWebhook(string $webhook): self
    {
        $obj = clone $this;
        $obj['webhook'] = $webhook;

        return $obj;
    }
}
