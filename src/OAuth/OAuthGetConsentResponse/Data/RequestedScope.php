<?php

declare(strict_types=1);

namespace Telnyx\OAuth\OAuthGetConsentResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type requested_scope = array{
 *   id?: string, description?: string, name?: string
 * }
 */
final class RequestedScope implements BaseModel
{
    /** @use SdkModel<requested_scope> */
    use SdkModel;

    /**
     * Scope ID.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Scope description.
     */
    #[Api(optional: true)]
    public ?string $description;

    /**
     * Scope name.
     */
    #[Api(optional: true)]
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

        null !== $id && $obj->id = $id;
        null !== $description && $obj->description = $description;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * Scope ID.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Scope description.
     */
    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * Scope name.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
