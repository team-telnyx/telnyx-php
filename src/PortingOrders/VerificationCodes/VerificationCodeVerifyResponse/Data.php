<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes\VerificationCodeVerifyResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string,
 *   createdAt?: \DateTimeInterface,
 *   phoneNumber?: string,
 *   portingOrderID?: string,
 *   recordType?: string,
 *   updatedAt?: \DateTimeInterface,
 *   verified?: bool,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting verification code.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * E164 formatted phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Identifies the associated porting order.
     */
    #[Api('porting_order_id', optional: true)]
    public ?string $portingOrderID;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Indicates whether the verification code has been verified.
     */
    #[Api(optional: true)]
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
        ?\DateTimeInterface $createdAt = null,
        ?string $phoneNumber = null,
        ?string $portingOrderID = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?bool $verified = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $portingOrderID && $obj->portingOrderID = $portingOrderID;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $verified && $obj->verified = $verified;

        return $obj;
    }

    /**
     * Uniquely identifies this porting verification code.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the associated porting order.
     */
    public function withPortingOrderID(string $portingOrderID): self
    {
        $obj = clone $this;
        $obj->portingOrderID = $portingOrderID;

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

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Indicates whether the verification code has been verified.
     */
    public function withVerified(bool $verified): self
    {
        $obj = clone $this;
        $obj->verified = $verified;

        return $obj;
    }
}
