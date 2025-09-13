<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Telephone number filter operations for log messages. Use 'eq' for exact matches or 'contains' for partial matches.
 *
 * @phpstan-type telephone_number = array{contains?: string, eq?: string}
 */
final class TelephoneNumber implements BaseModel
{
    /** @use SdkModel<telephone_number> */
    use SdkModel;

    /**
     * The partial phone number to filter log messages for. Requires 3-15 digits.
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * The phone number to filter log messages for or "null" to filter for logs without a phone number.
     */
    #[Api(optional: true)]
    public ?string $eq;

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
        ?string $eq = null
    ): self {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;
        null !== $eq && $obj->eq = $eq;

        return $obj;
    }

    /**
     * The partial phone number to filter log messages for. Requires 3-15 digits.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }

    /**
     * The phone number to filter log messages for or "null" to filter for logs without a phone number.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj->eq = $eq;

        return $obj;
    }
}
