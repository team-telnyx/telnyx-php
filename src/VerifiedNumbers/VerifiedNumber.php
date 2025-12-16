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
 *   recordType?: null|RecordType|value-of<RecordType>,
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
        $self = new self;

        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $verifiedAt && $self['verifiedAt'] = $verifiedAt;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The possible verified numbers record types.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withVerifiedAt(string $verifiedAt): self
    {
        $self = clone $this;
        $self['verifiedAt'] = $verifiedAt;

        return $self;
    }
}
