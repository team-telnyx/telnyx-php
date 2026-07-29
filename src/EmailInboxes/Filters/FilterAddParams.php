<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Filters;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Filters\FilterAddParams\Type;

/**
 * Adds entries to either the allowlist or blocklist. The operation is an
 * idempotent set union: entries already present remain unchanged.
 *
 * @see Telnyx\Services\EmailInboxes\FiltersService::add()
 *
 * @phpstan-type FilterAddParamsShape = array{
 *   entries: list<string>, type: Type|value-of<Type>
 * }
 */
final class FilterAddParams implements BaseModel
{
    /** @use SdkModel<FilterAddParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $entries */
    #[Required(list: 'string')]
    public array $entries;

    /**
     * The list to change.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new FilterAddParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FilterAddParams::with(entries: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FilterAddParams)->withEntries(...)->withType(...)
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
     *
     * @param list<string> $entries
     * @param Type|value-of<Type> $type
     */
    public static function with(array $entries, Type|string $type): self
    {
        $self = new self;

        $self['entries'] = $entries;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<string> $entries
     */
    public function withEntries(array $entries): self
    {
        $self = clone $this;
        $self['entries'] = $entries;

        return $self;
    }

    /**
     * The list to change.
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
