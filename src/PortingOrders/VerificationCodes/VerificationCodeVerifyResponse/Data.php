<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   phone_number?: string|null,
 *   porting_order_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   verified?: bool|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting verification code.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * E164 formatted phone number.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Identifies the associated porting order.
     */
    #[Optional]
    public ?string $porting_order_id;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * Indicates whether the verification code has been verified.
     */
    #[Optional]
    public ?bool $verified;

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
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $phone_number = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
        ?bool $verified = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $verified && $obj['verified'] = $verified;

        return $obj;
    }

    /**
     * Uniquely identifies this porting verification code.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the associated porting order.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj['porting_order_id'] = $portingOrderID;

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

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * Indicates whether the verification code has been verified.
     */
    public function withVerified(bool $verified): self
    {
        $obj = clone $this;
        $obj['verified'] = $verified;

        return $obj;
    }
}
