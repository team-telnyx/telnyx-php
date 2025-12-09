<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks\PortabilityCheckRunResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   fastPortable?: bool|null,
 *   notPortableReason?: string|null,
 *   phoneNumber?: string|null,
 *   portable?: bool|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Indicates whether this phone number is FastPort eligible.
     */
    #[Optional('fast_portable')]
    public ?bool $fastPortable;

    /**
     * If this phone number is not portable, explains why. Empty string if the number is portable.
     */
    #[Optional('not_portable_reason')]
    public ?string $notPortableReason;

    /**
     * The +E.164 formatted phone number this result is about.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Indicates whether this phone number is portable.
     */
    #[Optional]
    public ?bool $portable;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

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
        ?bool $fastPortable = null,
        ?string $notPortableReason = null,
        ?string $phoneNumber = null,
        ?bool $portable = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $fastPortable && $self['fastPortable'] = $fastPortable;
        null !== $notPortableReason && $self['notPortableReason'] = $notPortableReason;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $portable && $self['portable'] = $portable;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Indicates whether this phone number is FastPort eligible.
     */
    public function withFastPortable(bool $fastPortable): self
    {
        $self = clone $this;
        $self['fastPortable'] = $fastPortable;

        return $self;
    }

    /**
     * If this phone number is not portable, explains why. Empty string if the number is portable.
     */
    public function withNotPortableReason(string $notPortableReason): self
    {
        $self = clone $this;
        $self['notPortableReason'] = $notPortableReason;

        return $self;
    }

    /**
     * The +E.164 formatted phone number this result is about.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Indicates whether this phone number is portable.
     */
    public function withPortable(bool $portable): self
    {
        $self = clone $this;
        $self['portable'] = $portable;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
