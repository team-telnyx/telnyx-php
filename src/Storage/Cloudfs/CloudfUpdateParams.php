<?php

declare(strict_types=1);

namespace Telnyx\Storage\Cloudfs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates a CloudFS filesystem. Only `name` can be changed; other fields are immutable and unknown fields are rejected with a `400`. Renaming to a name that already exists in your organization returns a `422`.
 *
 * @see Telnyx\Services\Storage\CloudfsService::update()
 *
 * @phpstan-type CloudfUpdateParamsShape = array{name?: string|null}
 */
final class CloudfUpdateParams implements BaseModel
{
    /** @use SdkModel<CloudfUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New filesystem name, unique within your organization. Names are trimmed and lowercased; after normalization they may contain lowercase letters, numbers, `.`, `_`, and `-` only.
     */
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
    public static function with(?string $name = null): self
    {
        $self = new self;

        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * New filesystem name, unique within your organization. Names are trimmed and lowercased; after normalization they may contain lowercase letters, numbers, `.`, `_`, and `-` only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
