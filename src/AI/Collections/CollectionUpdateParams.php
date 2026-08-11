<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates a collection's metadata (`name` and/or `description`). Sources and settings are managed through their own sub-resources.
 *
 * @see Telnyx\Services\AI\CollectionsService::update()
 *
 * @phpstan-type CollectionUpdateParamsShape = array{
 *   description?: string|null, name?: string|null
 * }
 */
final class CollectionUpdateParams implements BaseModel
{
    /** @use SdkModel<CollectionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $name;

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
        ?string $name = null
    ): self {
        $self = new self;

        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
