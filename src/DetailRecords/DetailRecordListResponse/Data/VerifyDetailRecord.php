<?php

declare(strict_types=1);

namespace Telnyx\DetailRecords\DetailRecordListResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DetailRecords\DetailRecordListResponse\Data\VerifyDetailRecord\VerifyChannelType;

/**
 * @phpstan-type VerifyDetailRecordShape = array{
 *   record_type: string,
 *   id?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   currency?: string|null,
 *   delivery_status?: string|null,
 *   destination_phone_number?: string|null,
 *   rate?: string|null,
 *   rate_measured_in?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   verification_status?: string|null,
 *   verify_channel_id?: string|null,
 *   verify_channel_type?: value-of<VerifyChannelType>|null,
 *   verify_profile_id?: string|null,
 *   verify_usage_fee?: string|null,
 * }
 */
final class VerifyDetailRecord implements BaseModel
{
    /** @use SdkModel<VerifyDetailRecordShape> */
    use SdkModel;

    #[Api]
    public string $record_type;

    /**
     * Unique ID of the verification.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Telnyx account currency used to describe monetary values, including billing costs.
     */
    #[Api(optional: true)]
    public ?string $currency;

    #[Api(optional: true)]
    public ?string $delivery_status;

    /**
     * E.164 formatted phone number.
     */
    #[Api(optional: true)]
    public ?string $destination_phone_number;

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing costs.
     */
    #[Api(optional: true)]
    public ?string $rate;

    /**
     * Billing unit used to calculate the Telnyx billing costs.
     */
    #[Api(optional: true)]
    public ?string $rate_measured_in;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    #[Api(optional: true)]
    public ?string $verification_status;

    #[Api(optional: true)]
    public ?string $verify_channel_id;

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
     * @var value-of<VerifyChannelType>|null $verify_channel_type
     */
    #[Api(enum: VerifyChannelType::class, optional: true)]
    public ?string $verify_channel_type;

    #[Api(optional: true)]
    public ?string $verify_profile_id;

    /**
     * Currency amount for Verify Usage Fee.
     */
    #[Api(optional: true)]
    public ?string $verify_usage_fee;

    /**
     * `new VerifyDetailRecord()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyDetailRecord::with(record_type: ...)
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
     * @param VerifyChannelType|value-of<VerifyChannelType> $verify_channel_type
     */
    public static function with(
        string $record_type = 'verification_detail_record',
        ?string $id = null,
        ?\DateTimeInterface $created_at = null,
        ?string $currency = null,
        ?string $delivery_status = null,
        ?string $destination_phone_number = null,
        ?string $rate = null,
        ?string $rate_measured_in = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $verification_status = null,
        ?string $verify_channel_id = null,
        VerifyChannelType|string|null $verify_channel_type = null,
        ?string $verify_profile_id = null,
        ?string $verify_usage_fee = null,
    ): self {
        $obj = new self;

        $obj->record_type = $record_type;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $currency && $obj->currency = $currency;
        null !== $delivery_status && $obj->delivery_status = $delivery_status;
        null !== $destination_phone_number && $obj->destination_phone_number = $destination_phone_number;
        null !== $rate && $obj->rate = $rate;
        null !== $rate_measured_in && $obj->rate_measured_in = $rate_measured_in;
        null !== $updated_at && $obj->updated_at = $updated_at;
        null !== $verification_status && $obj->verification_status = $verification_status;
        null !== $verify_channel_id && $obj->verify_channel_id = $verify_channel_id;
        null !== $verify_channel_type && $obj['verify_channel_type'] = $verify_channel_type;
        null !== $verify_profile_id && $obj->verify_profile_id = $verify_profile_id;
        null !== $verify_usage_fee && $obj->verify_usage_fee = $verify_usage_fee;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * Unique ID of the verification.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Telnyx account currency used to describe monetary values, including billing costs.
     */
    public function withCurrency(string $currency): self
    {
        $obj = clone $this;
        $obj->currency = $currency;

        return $obj;
    }

    public function withDeliveryStatus(string $deliveryStatus): self
    {
        $obj = clone $this;
        $obj->delivery_status = $deliveryStatus;

        return $obj;
    }

    /**
     * E.164 formatted phone number.
     */
    public function withDestinationPhoneNumber(
        string $destinationPhoneNumber
    ): self {
        $obj = clone $this;
        $obj->destination_phone_number = $destinationPhoneNumber;

        return $obj;
    }

    /**
     * Currency amount per billing unit used to calculate the Telnyx billing costs.
     */
    public function withRate(string $rate): self
    {
        $obj = clone $this;
        $obj->rate = $rate;

        return $obj;
    }

    /**
     * Billing unit used to calculate the Telnyx billing costs.
     */
    public function withRateMeasuredIn(string $rateMeasuredIn): self
    {
        $obj = clone $this;
        $obj->rate_measured_in = $rateMeasuredIn;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }

    public function withVerificationStatus(string $verificationStatus): self
    {
        $obj = clone $this;
        $obj->verification_status = $verificationStatus;

        return $obj;
    }

    public function withVerifyChannelID(string $verifyChannelID): self
    {
        $obj = clone $this;
        $obj->verify_channel_id = $verifyChannelID;

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
        $obj['verify_channel_type'] = $verifyChannelType;

        return $obj;
    }

    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj->verify_profile_id = $verifyProfileID;

        return $obj;
    }

    /**
     * Currency amount for Verify Usage Fee.
     */
    public function withVerifyUsageFee(string $verifyUsageFee): self
    {
        $obj = clone $this;
        $obj->verify_usage_fee = $verifyUsageFee;

        return $obj;
    }
}
