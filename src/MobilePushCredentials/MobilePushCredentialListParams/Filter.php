<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias].
 *
 * @phpstan-type filter_alias = array{alias?: string, type?: value-of<Type>}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Unique mobile push credential alias.
     */
    #[Api(optional: true)]
    public ?string $alias;

    /**
     * type of mobile push credentials.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $alias = null,
        Type|string|null $type = null
    ): self {
        $obj = new self;

        null !== $alias && $obj->alias = $alias;
        null !== $type && $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * Unique mobile push credential alias.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj->alias = $alias;

        return $obj;
    }

    /**
     * type of mobile push credentials.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
