<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallerNameShape = array{
 *   caller_name?: string|null, error_code?: string|null
 * }
 */
final class CallerName implements BaseModel
{
    /** @use SdkModel<CallerNameShape> */
    use SdkModel;

    /**
     * The name of the requested phone number's owner as per the CNAM database.
     */
    #[Api(optional: true)]
    public ?string $caller_name;

    /**
     * A caller-name lookup specific error code, expressed as a stringified 5-digit integer.
     */
    #[Api(optional: true)]
    public ?string $error_code;

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
        ?string $caller_name = null,
        ?string $error_code = null
    ): self {
        $obj = new self;

        null !== $caller_name && $obj->caller_name = $caller_name;
        null !== $error_code && $obj->error_code = $error_code;

        return $obj;
    }

    /**
     * The name of the requested phone number's owner as per the CNAM database.
     */
    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj->caller_name = $callerName;

        return $obj;
    }

    /**
     * A caller-name lookup specific error code, expressed as a stringified 5-digit integer.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->error_code = $errorCode;

        return $obj;
    }
}
