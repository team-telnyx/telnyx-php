<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type caller_name = array{
 *   callerName?: string|null, errorCode?: string|null
 * }
 */
final class CallerName implements BaseModel
{
    /** @use SdkModel<caller_name> */
    use SdkModel;

    /**
     * The name of the requested phone number's owner as per the CNAM database.
     */
    #[Api('caller_name', optional: true)]
    public ?string $callerName;

    /**
     * A caller-name lookup specific error code, expressed as a stringified 5-digit integer.
     */
    #[Api('error_code', optional: true)]
    public ?string $errorCode;

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
        ?string $callerName = null,
        ?string $errorCode = null
    ): self {
        $obj = new self;

        null !== $callerName && $obj->callerName = $callerName;
        null !== $errorCode && $obj->errorCode = $errorCode;

        return $obj;
    }

    /**
     * The name of the requested phone number's owner as per the CNAM database.
     */
    public function withCallerName(string $callerName): self
    {
        $obj = clone $this;
        $obj->callerName = $callerName;

        return $obj;
    }

    /**
     * A caller-name lookup specific error code, expressed as a stringified 5-digit integer.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->errorCode = $errorCode;

        return $obj;
    }
}
