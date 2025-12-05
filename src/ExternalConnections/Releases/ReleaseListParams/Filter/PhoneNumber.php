<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Phone number filter operations. Use 'eq' for exact matches or 'contains' for partial matches.
 *
 * @phpstan-type PhoneNumberShape = array{contains?: string|null, eq?: string|null}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * The partial phone number to filter by. Requires 3-15 digits.
     */
    #[Api(optional: true)]
    public ?string $contains;

    /**
     * The phone number to filter by.
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

        null !== $contains && $obj['contains'] = $contains;
        null !== $eq && $obj['eq'] = $eq;

        return $obj;
    }

    /**
     * The partial phone number to filter by. Requires 3-15 digits.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj['contains'] = $contains;

        return $obj;
    }

    /**
     * The phone number to filter by.
     */
    public function withEq(string $eq): self
    {
        $obj = clone $this;
        $obj['eq'] = $eq;

        return $obj;
    }
}
