<?php

declare(strict_types=1);

namespace Telnyx\NumberLookup\NumberLookupGetResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Enhanced caller name for the phone number's owner. Populated when `type=enhanced-caller-name` is requested.
 *
 * @phpstan-type EnhancedCallerNameShape = array{
 *   callerName?: string|null, errorCode?: string|null
 * }
 */
final class EnhancedCallerName implements BaseModel
{
    /** @use SdkModel<EnhancedCallerNameShape> */
    use SdkModel;

    /**
     * The name associated with the phone number.
     */
    #[Optional('caller_name', nullable: true)]
    public ?string $callerName;

    /**
     * A lookup-specific error code if the enhanced caller name could not be resolved; otherwise null.
     */
    #[Optional('error_code', nullable: true)]
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
        string|Omitted|null $callerName = Omitted::VALUE,
        string|Omitted|null $errorCode = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $callerName && $self['callerName'] = $callerName;
        Omitted::VALUE !== $errorCode && $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * The name associated with the phone number.
     */
    public function withCallerName(?string $callerName): self
    {
        $self = clone $this;
        $self['callerName'] = $callerName;

        return $self;
    }

    /**
     * A lookup-specific error code if the enhanced caller name could not be resolved; otherwise null.
     */
    public function withErrorCode(?string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }
}
