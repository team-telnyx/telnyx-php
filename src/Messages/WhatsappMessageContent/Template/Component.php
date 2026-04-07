<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent\Template;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappMessageContent\Template\Component\Parameter;
use Telnyx\Messages\WhatsappMessageContent\Template\Component\SubType;
use Telnyx\Messages\WhatsappMessageContent\Template\Component\Type;

/**
 * @phpstan-import-type ParameterShape from \Telnyx\Messages\WhatsappMessageContent\Template\Component\Parameter
 *
 * @phpstan-type ComponentShape = array{
 *   index?: int|null,
 *   parameters?: list<Parameter|ParameterShape>|null,
 *   subType?: null|SubType|value-of<SubType>,
 *   type?: null|Type|value-of<Type>,
 * }
 */
final class Component implements BaseModel
{
    /** @use SdkModel<ComponentShape> */
    use SdkModel;

    /**
     * Button index (required for button components).
     */
    #[Optional]
    public ?int $index;

    /** @var list<Parameter>|null $parameters */
    #[Optional(list: Parameter::class)]
    public ?array $parameters;

    /** @var value-of<SubType>|null $subType */
    #[Optional('sub_type', enum: SubType::class)]
    public ?string $subType;

    /** @var value-of<Type>|null $type */
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
     * @param list<Parameter|ParameterShape>|null $parameters
     * @param SubType|value-of<SubType>|null $subType
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?int $index = null,
        ?array $parameters = null,
        SubType|string|null $subType = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $index && $self['index'] = $index;
        null !== $parameters && $self['parameters'] = $parameters;
        null !== $subType && $self['subType'] = $subType;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Button index (required for button components).
     */
    public function withIndex(int $index): self
    {
        $self = clone $this;
        $self['index'] = $index;

        return $self;
    }

    /**
     * @param list<Parameter|ParameterShape> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * @param SubType|value-of<SubType> $subType
     */
    public function withSubType(SubType|string $subType): self
    {
        $self = clone $this;
        $self['subType'] = $subType;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
