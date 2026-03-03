<?php

declare(strict_types=1);

namespace Telnyx\SessionAnalysis\Metadata\MetadataGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type QueryParameterShape = array{
 *   default: string,
 *   description: string,
 *   type: string,
 *   enumValues?: list<string>|null,
 *   max?: int|null,
 *   min?: int|null,
 * }
 */
final class QueryParameter implements BaseModel
{
    /** @use SdkModel<QueryParameterShape> */
    use SdkModel;

    #[Required]
    public string $default;

    #[Required]
    public string $description;

    #[Required]
    public string $type;

    /** @var list<string>|null $enumValues */
    #[Optional('enum_values', list: 'string', nullable: true)]
    public ?array $enumValues;

    #[Optional(nullable: true)]
    public ?int $max;

    #[Optional(nullable: true)]
    public ?int $min;

    /**
     * `new QueryParameter()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * QueryParameter::with(default: ..., description: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new QueryParameter)->withDefault(...)->withDescription(...)->withType(...)
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
     * @param list<string>|null $enumValues
     */
    public static function with(
        string $default,
        string $description,
        string $type,
        ?array $enumValues = null,
        ?int $max = null,
        ?int $min = null,
    ): self {
        $self = new self;

        $self['default'] = $default;
        $self['description'] = $description;
        $self['type'] = $type;

        null !== $enumValues && $self['enumValues'] = $enumValues;
        null !== $max && $self['max'] = $max;
        null !== $min && $self['min'] = $min;

        return $self;
    }

    public function withDefault(string $default): self
    {
        $self = clone $this;
        $self['default'] = $default;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param list<string>|null $enumValues
     */
    public function withEnumValues(?array $enumValues): self
    {
        $self = clone $this;
        $self['enumValues'] = $enumValues;

        return $self;
    }

    public function withMax(?int $max): self
    {
        $self = clone $this;
        $self['max'] = $max;

        return $self;
    }

    public function withMin(?int $min): self
    {
        $self = clone $this;
        $self['min'] = $min;

        return $self;
    }
}
