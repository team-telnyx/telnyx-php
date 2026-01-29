<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FunctionDefinitionShape = array{
 *   name: string, description?: string|null, parameters?: array<string,mixed>|null
 * }
 */
final class FunctionDefinition implements BaseModel
{
    /** @use SdkModel<FunctionDefinitionShape> */
    use SdkModel;

    #[Required]
    public string $name;

    #[Optional]
    public ?string $description;

    /** @var array<string,mixed>|null $parameters */
    #[Optional(map: 'mixed')]
    public ?array $parameters;

    /**
     * `new FunctionDefinition()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FunctionDefinition::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FunctionDefinition)->withName(...)
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
     * @param array<string,mixed>|null $parameters
     */
    public static function with(
        string $name,
        ?string $description = null,
        ?array $parameters = null
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $parameters && $self['parameters'] = $parameters;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * @param array<string,mixed> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }
}
