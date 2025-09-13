<?php

declare(strict_types=1);

namespace Telnyx\PortabilityChecks\PortabilityCheckRunResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type data_alias = array{
 *   fastPortable?: bool,
 *   notPortableReason?: string,
 *   phoneNumber?: string,
 *   portable?: bool,
 *   recordType?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * Indicates whether this phone number is FastPort eligible.
     */
    #[Api('fast_portable', optional: true)]
    public ?bool $fastPortable;

    /**
     * If this phone number is not portable, explains why. Empty string if the number is portable.
     */
    #[Api('not_portable_reason', optional: true)]
    public ?string $notPortableReason;

    /**
     * The +E.164 formatted phone number this result is about.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Indicates whether this phone number is portable.
     */
    #[Api(optional: true)]
    public ?bool $portable;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
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
        $obj = new self;

        null !== $fastPortable && $obj->fastPortable = $fastPortable;
        null !== $notPortableReason && $obj->notPortableReason = $notPortableReason;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $portable && $obj->portable = $portable;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * Indicates whether this phone number is FastPort eligible.
     */
    public function withFastPortable(bool $fastPortable): self
    {
        $obj = clone $this;
        $obj->fastPortable = $fastPortable;

        return $obj;
    }

    /**
     * If this phone number is not portable, explains why. Empty string if the number is portable.
     */
    public function withNotPortableReason(string $notPortableReason): self
    {
        $obj = clone $this;
        $obj->notPortableReason = $notPortableReason;

        return $obj;
    }

    /**
     * The +E.164 formatted phone number this result is about.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Indicates whether this phone number is portable.
     */
    public function withPortable(bool $portable): self
    {
        $obj = clone $this;
        $obj->portable = $portable;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
