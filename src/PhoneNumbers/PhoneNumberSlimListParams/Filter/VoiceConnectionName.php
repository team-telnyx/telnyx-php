<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter by voice connection name pattern matching (requires include_connection param).
 *
 * @phpstan-type voice_connection_name = array{
 *   contains?: string, endsWith?: string, eq?: string, startsWith?: string
 * }
 */
final class VoiceConnectionName implements BaseModel
{
    /** @use SdkModel<voice_connection_name> */
    use SdkModel;

    /**
     * Filter contains connection name. Requires at least three characters and the include_connection param.
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * Filter ends with connection name. Requires at least three characters and the include_connection param.
     */
    #[Api('ends_with', optional: true)]
    public ?string $endsWith;

    /**
     * Filter by connection name.
     */
    #[Api(optional: true)]
    public ?string $eq;

    /**
     * Filter starts with connection name. Requires at least three characters and the include_connection param.
     */
    #[Api('starts_with', optional: true)]
    public ?string $startsWith;

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
        ?string $contains = null,
        ?string $endsWith = null,
        ?string $eq = null,
        ?string $startsWith = null,
    ): self {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;
        null !== $endsWith && $obj->endsWith = $endsWith;
        null !== $eq && $obj->eq = $eq;
        null !== $startsWith && $obj->startsWith = $startsWith;

        return $obj;
    }

    /**
     * Filter contains connection name. Requires at least three characters and the include_connection param.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter ends with connection name. Requires at least three characters and the include_connection param.
     */
    public function withEndsWith(string $endsWith): self
    {
        $obj = clone $this;
        $obj->endsWith = $endsWith;

        return $obj;
    }

    /**
     * Filter by connection name.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }

    /**
     * Filter starts with connection name. Requires at least three characters and the include_connection param.
     */
    public function withStartsWith(string $startsWith): self
    {
        $obj = clone $this;
        $obj->startsWith = $startsWith;

        return $obj;
    }
}
