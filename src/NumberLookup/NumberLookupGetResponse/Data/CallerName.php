<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallerNameShape = array{
 *   callerName?: string|null, errorCode?: string|null
 * }
 */
final class CallerName implements BaseModel
{
    /** @use SdkModel<CallerNameShape> */
    use SdkModel;

    /**
     * The name of the requested phone number's owner as per the CNAM database.
     */
    #[Optional('caller_name')]
    public ?string $callerName;

    /**
     * A caller-name lookup specific error code, expressed as a stringified 5-digit integer.
     */
    #[Optional('error_code')]
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
        $self = new self;

        null !== $callerName && $self['callerName'] = $callerName;
        null !== $errorCode && $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * The name of the requested phone number's owner as per the CNAM database.
     */
    public function withCallerName(string $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * A caller-name lookup specific error code, expressed as a stringified 5-digit integer.
     */
    public function withErrorCode(string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }
}
