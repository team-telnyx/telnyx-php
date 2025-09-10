<?php

declare(strict_types=1);

namespace Telnyx\AI\Chat\ChatCreateCompletionParams\Tool\ChatCompletionToolParam;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type function1_alias = array{
 *   name: string,
 *   description?: string|null,
 *   parameters?: array<string, mixed>|null,
 * }
 */
final class Function1 implements BaseModel
{
    /** @use SdkModel<function1_alias> */
    use SdkModel;

    #[Api]
    public string $name;

    #[Api(optional: true)]
    public ?string $description;

    /** @var array<string, mixed>|null $parameters */
    #[Api(map: 'mixed', optional: true)]
    public ?array $parameters;

    /**
     * `new Function1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Function1::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Function1)->withName(...)
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
     * @param array<string, mixed> $parameters
     */
    public static function with(
        string $name,
        ?string $description = null,
        ?array $parameters = null
    ): self {
        $obj = new self;

        $obj->name = $name;

        null !== $description && $obj->description = $description;
        null !== $parameters && $obj->parameters = $parameters;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    public function withDescription(string $description): self
    {
        $obj = clone $this;
        $obj->description = $description;

        return $obj;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function withParameters(array $parameters): self
    {
        $obj = clone $this;
        $obj->parameters = $parameters;

        return $obj;
    }
}
