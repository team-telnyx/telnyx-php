<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumber\RecordType;

/**
 * @phpstan-type VerifiedNumberShape = array{
 *   phone_number?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   verified_at?: string|null,
 * }
 */
final class VerifiedNumber implements BaseModel
{
    /** @use SdkModel<VerifiedNumberShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * The possible verified numbers record types.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    #[Api(optional: true)]
    public ?string $verified_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $phone_number = null,
        RecordType|string|null $record_type = null,
        ?string $verified_at = null,
    ): self {
        $obj = new self;

        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $verified_at && $obj['verified_at'] = $verified_at;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    public function withVerifiedAt(string $verifiedAt): self
    {
        $obj = clone $this;
        $obj['verified_at'] = $verifiedAt;

        return $obj;
    }
}
