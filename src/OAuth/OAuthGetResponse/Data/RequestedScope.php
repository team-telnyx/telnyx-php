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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $description && $obj['description'] = $description;
        null !== $name && $obj['name'] = $name;

        return $obj;
    }

    /**
     * Scope ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Scope description.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj['description'] = $description;

        return $obj;
    }

    /**
     * Scope name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }
}
