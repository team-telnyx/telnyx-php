<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\VerifyDetailRecord\VerifyChannelType;

/**
 * @phpstan-type VerifyDetailRecordShape = array{
 *   recordType: string,
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   deliveryStatus?: string|null,
 *   destinationPhoneNumber?: string|null,
 *   rate?: string|null,
 *   rateMeasuredIn?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   verificationStatus?: string|null,
 *   verifyChannelID?: string|null,
 *   verifyChannelType?: value-of<VerifyChannelType>|null,
 *   verifyProfileID?: string|null,
 *   verifyUsageFee?: string|null,
 * }
 */
final class VerifyDetailRecord implements BaseModel
{
    /** @use SdkModel<VerifyDetailRecordShape> */
    use SdkModel;

    #[Required('record_type')]
    public string $recordType;

    /**
     * Unique ID of the verification.
     */
    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Telnyx account currency used to describe monetary values, including billing costs.
     */
    #[Optional]
    public ?string $currency;

    #[Optional('delivery_status')]
    public ?string $deliveryStatus;

    /**
     * E.164 formatted phone number.
     */
    #[Optional('destination_phone_number')]
    public ?string $destinationPhoneNumber;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing costs.
     */
    #[Optional]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing costs.
     */
    #[Optional('rate_measured_in')]
    public ?string $rateMeasuredIn;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Optional('verification_status')]
    public ?string $verificationStatus;

    #[Optional('verify_channel_id')]
    public ?string $verifyChannelID;

    /**
     * Depending on the type of verification, the `verify_channel_id`
     * points to one of the following channel ids;
     * ---
     * verify_channel_type | verify_channel_id
     * ------------------- | -----------------
     * sms, psd2           | messaging_id
     * call, flashcall     | call_control_id
     * ---.
     *
     * @var value-of<VerifyChannelType>|null $verifyChannelType
     */
    #[Optional('verify_channel_type', enum: VerifyChannelType::class)]
    public ?string $verifyChannelType;

    #[Optional('verify_profile_id')]
    public ?string $verifyProfileID;

    /**
     * Currency amount for Verify Usage Fee.
     */
    #[Optional('verify_usage_fee')]
    public ?string $verifyUsageFee;

    /**
     * `new VerifyDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyDetailRecord::with(recordType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyDetailRecord)->withRecordType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param VerifyChannelType|value-of<VerifyChannelType> $verifyChannelType
     */
    public static function with(
        string $recordType = 'verification_detail_record',
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $currency = null,
        ?string $deliveryStatus = null,
        ?string $destinationPhoneNumber = null,
        ?string $rate = null,
        ?string $rateMeasuredIn = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $verificationStatus = null,
        ?string $verifyChannelID = null,
        VerifyChannelType|string|null $verifyChannelType = null,
        ?string $verifyProfileID = null,
        ?string $verifyUsageFee = null,
    ): self {
        $obj = new self;

        $obj['recordType'] = $recordType;

        null !== $id && $obj['id'] = $id;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $currency && $obj['currency'] = $currency;
        null !== $deliveryStatus && $obj['deliveryStatus'] = $deliveryStatus;
        null !== $destinationPhoneNumber && $obj['destinationPhoneNumber'] = $destinationPhoneNumber;
        null !== $rate && $obj['rate'] = $rate;
        null !== $rateMeasuredIn && $obj['rateMeasuredIn'] = $rateMeasuredIn;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $verificationStatus && $obj['verificationStatus'] = $verificationStatus;
        null !== $verifyChannelID && $obj['verifyChannelID'] = $verifyChannelID;
        null !== $verifyChannelType && $obj['verifyChannelType'] = $verifyChannelType;
        null !== $verifyProfileID && $obj['verifyProfileID'] = $verifyProfileID;
        null !== $verifyUsageFee && $obj['verifyUsageFee'] = $verifyUsageFee;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Unique ID of the verification.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing costs.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj['currency'] = $currency;

        return $obj;
    }

    public function withDeliveryStatus(string $deliveryStatus): self
    {
        $obj = clone $this;
        $obj['deliveryStatus'] = $deliveryStatus;

        return $obj;
    }

    /**
     * E.164 formatted phone number.
     */
    public function withDestinationPhoneNumber(
        string $destinationPhoneNumber
    ): self {
        $obj = clone $this;
        $obj['destinationPhoneNumber'] = $destinationPhoneNumber;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing costs.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj['rate'] = $rate;

        return $obj;
    }

    /**
     * Billing unit used to calculate the Telnyx billing costs.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $obj = clone $this;
        $obj['rateMeasuredIn'] = $rateMeasuredIn;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    public function withVerificationStatus(string $verificationStatus): self
    {
        $obj = clone $this;
        $obj['verificationStatus'] = $verificationStatus;

        return $obj;
    }

    public function withVerifyChannelID(string $verifyChannelID): self
    {
        $obj = clone $this;
        $obj['verifyChannelID'] = $verifyChannelID;

        return $obj;
    }

    /**
     * Depending on the type of verification, the `verify_channel_id`
     * points to one of the following channel ids;
     * ---
     * verify_channel_type | verify_channel_id
     * ------------------- | -----------------
     * sms, psd2           | messaging_id
     * call, flashcall     | call_control_id
     * ---.
     *
     * @param VerifyChannelType|value-of<VerifyChannelType> $verifyChannelType
     */
    public function withVerifyChannelType(
        VerifyChannelType|string $verifyChannelType
    ): self {
        $obj = clone $this;
        $obj['verifyChannelType'] = $verifyChannelType;

        return $obj;
    }

    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj['verifyProfileID'] = $verifyProfileID;

        return $obj;
    }

    /**
     * Currency amount for Verify Usage Fee.
     */
    public function withVerifyUsageFee(string $verifyUsageFee): self
    {
        $obj = clone $this;
        $obj['verifyUsageFee'] = $verifyUsageFee;

        return $obj;
    }
}
