<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Voice\VoiceListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Filter by connection name pattern matching.
 *
 * @phpstan-type connection_name = array{contains?: string}
 */
final class ConnectionName implements BaseModel
{
    /** @use SdkModel<connection_name> */
    use SdkModel;

    /**
     * Filter contains connection name. Requires at least three characters.
     */
    #[Api(optional: true)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter contains connection name. Requires at least three characters.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }
}
