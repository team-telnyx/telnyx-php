<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumber\RecordType;

/**
 * @phpstan-type VerifiedNumberShape = array{
 *   phoneNumber?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   verifiedAt?: string|null,
 * }
 */
final class VerifiedNumber implements BaseModel
{
    /** @use SdkModel<VerifiedNumberShape> */
    use SdkModel;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The possible verified numbers record types.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    #[Optional('verified_at')]
    public ?string $verifiedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $phoneNumber = null,
        RecordType|string|null $recordType = null,
        ?string $verifiedAt = null,
    ): self {
        $obj = new self;

        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $verifiedAt && $obj['verifiedAt'] = $verifiedAt;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * The possible verified numbers record types.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    public function withVerifiedAt(string $verifiedAt): self
    {
        $obj = clone $this;
        $obj['verifiedAt'] = $verifiedAt;

        return $obj;
    }
}
