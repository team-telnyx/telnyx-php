<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks\PortabilityCheckRunResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   fast_portable?: bool|null,
 *   not_portable_reason?: string|null,
 *   phone_number?: string|null,
 *   portable?: bool|null,
 *   record_type?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Indicates whether this phone number is FastPort eligible.
     */
    #[Optional]
    public ?bool $fast_portable;

    /**
     * If this phone number is not portable, explains why. Empty string if the number is portable.
     */
    #[Optional]
    public ?string $not_portable_reason;

    /**
     * The +E.164 formatted phone number this result is about.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Indicates whether this phone number is portable.
     */
    #[Optional]
    public ?bool $portable;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

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
        ?bool $fast_portable = null,
        ?string $not_portable_reason = null,
        ?string $phone_number = null,
        ?bool $portable = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $fast_portable && $obj['fast_portable'] = $fast_portable;
        null !== $not_portable_reason && $obj['not_portable_reason'] = $not_portable_reason;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $portable && $obj['portable'] = $portable;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * Indicates whether this phone number is FastPort eligible.
     */
    public function withFastPortable(bool $fastPortable): self
    {
        $obj = clone $this;
        $obj['fast_portable'] = $fastPortable;

        return $obj;
    }

    /**
     * If this phone number is not portable, explains why. Empty string if the number is portable.
     */
    public function withNotPortableReason(string $notPortableReason): self
    {
        $obj = clone $this;
        $obj['not_portable_reason'] = $notPortableReason;

        return $obj;
    }

    /**
     * The +E.164 formatted phone number this result is about.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Indicates whether this phone number is portable.
     */
    public function withPortable(bool $portable): self
    {
        $obj = clone $this;
        $obj['portable'] = $portable;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
