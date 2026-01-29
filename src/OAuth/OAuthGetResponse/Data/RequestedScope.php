<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RequestedScopeShape = array{
 *   id?: string|null, description?: string|null, name?: string|null
 * }
 */
final class RequestedScope implements BaseModel
{
    /** @use SdkModel<RequestedScopeShape> */
    use SdkModel;

    /**
     * Scope ID.
     */
    #[Optional]
    public ?string $id;

    /**
     * Scope description.
     */
    #[Optional]
    public ?string $description;

    /**
     * Scope name.
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
    public static function with(
        ?string $id = null,
        ?string $description = null,
        ?string $name = null
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;

        return $self;
    }

    /**
     * Scope ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Scope description.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Scope name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
