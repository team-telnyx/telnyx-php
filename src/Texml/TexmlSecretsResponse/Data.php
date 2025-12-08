<?php

declare(strict_types=1);

namespace Telnyx\Texml\TexmlSecretsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Texml\TexmlSecretsResponse\Data\Value;

/**
 * @phpstan-type DataShape = array{
 *   name?: string|null, value?: value-of<Value>|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $name;

    /** @var value-of<Value>|null $value */
    #[Optional(enum: Value::class)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Value|value-of<Value> $value
     */
    public static function with(
        ?string $name = null,
        Value|string|null $value = null
    ): self {
        $obj = new self;

        null !== $name && $obj['name'] = $name;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
