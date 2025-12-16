<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\VerifyDetailRecord\VerifyChannelType;

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
 *   verifyChannelType?: null|VerifyChannelType|value-of<VerifyChannelType>,
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
        $self = new self;

        $self['recordType'] = $recordType;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $currency && $self['currency'] = $currency;
        null !== $deliveryStatus && $self['deliveryStatus'] = $deliveryStatus;
        null !== $destinationPhoneNumber && $self['destinationPhoneNumber'] = $destinationPhoneNumber;
        null !== $rate && $self['rate'] = $rate;
        null !== $rateMeasuredIn && $self['rateMeasuredIn'] = $rateMeasuredIn;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $verificationStatus && $self['verificationStatus'] = $verificationStatus;
        null !== $verifyChannelID && $self['verifyChannelID'] = $verifyChannelID;
        null !== $verifyChannelType && $self['verifyChannelType'] = $verifyChannelType;
        null !== $verifyProfileID && $self['verifyProfileID'] = $verifyProfileID;
        null !== $verifyUsageFee && $self['verifyUsageFee'] = $verifyUsageFee;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Unique ID of the verification.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing costs.
     */
    public function withCurrency(string $currency): self
    {
        $self = clone $this;
        $self['currency'] = $currency;

        return $self;
    }

    public function withDeliveryStatus(string $deliveryStatus): self
    {
        $self = clone $this;
        $self['deliveryStatus'] = $deliveryStatus;

        return $self;
    }

    /**
     * E.164 formatted phone number.
     */
    public function withDestinationPhoneNumber(
        string $destinationPhoneNumber
    ): self {
        $self = clone $this;
        $self['destinationPhoneNumber'] = $destinationPhoneNumber;

        return $self;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing costs.
     */
    public function withRate(string $rate): self
    {
        $self = clone $this;
        $self['rate'] = $rate;

        return $self;
    }

    /**
     * Billing unit used to calculate the Telnyx billing costs.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $self = clone $this;
        $self['rateMeasuredIn'] = $rateMeasuredIn;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withVerificationStatus(string $verificationStatus): self
    {
        $self = clone $this;
        $self['verificationStatus'] = $verificationStatus;

        return $self;
    }

    public function withVerifyChannelID(string $verifyChannelID): self
    {
        $self = clone $this;
        $self['verifyChannelID'] = $verifyChannelID;

        return $self;
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
        $self = clone $this;
        $self['verifyChannelType'] = $verifyChannelType;

        return $self;
    }

    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $self = clone $this;
        $self['verifyProfileID'] = $verifyProfileID;

        return $self;
    }

    /**
     * Currency amount for Verify Usage Fee.
     */
    public function withVerifyUsageFee(string $verifyUsageFee): self
    {
        $self = clone $this;
        $self['verifyUsageFee'] = $verifyUsageFee;

        return $self;
    }
}
