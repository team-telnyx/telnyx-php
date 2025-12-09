<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias].
 *
 * @phpstan-type FilterShape = array{
 *   alias?: string|null, type?: value-of<Type>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Unique mobile push credential alias.
     */
    #[Optional]
    public ?string $alias;

    /**
     * type of mobile push credentials.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
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
        $self = new self;

        null !== $alias && $self['alias'] = $alias;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Unique mobile push credential alias.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * type of mobile push credentials.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
