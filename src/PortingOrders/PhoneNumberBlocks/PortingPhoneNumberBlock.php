<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberType;

/**
 * @phpstan-type PortingPhoneNumberBlockShape = array{
 *   id?: string|null,
 *   activation_ranges?: list<ActivationRange>|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   phone_number_range?: PhoneNumberRange|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class PortingPhoneNumberBlock implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberBlockShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting phone number block.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the phone number range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange>|null $activation_ranges
     */
    #[Api(list: ActivationRange::class, optional: true)]
    public ?array $activation_ranges;

    /**
     * Specifies the country code for this porting phone number block. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Specifies the phone number range for this porting phone number block.
     */
    #[Api(optional: true)]
    public ?PhoneNumberRange $phone_number_range;

    /**
     * Specifies the phone number type for this porting phone number block.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ActivationRange> $activation_ranges
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $id = null,
        ?array $activation_ranges = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        ?PhoneNumberRange $phone_number_range = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activation_ranges && $obj->activation_ranges = $activation_ranges;
        null !== $country_code && $obj->country_code = $country_code;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $phone_number_range && $obj->phone_number_range = $phone_number_range;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies this porting phone number block.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the phone number range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRange> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $obj = clone $this;
        $obj->activation_ranges = $activationRanges;

        return $obj;
    }

    /**
     * Specifies the country code for this porting phone number block. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->country_code = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * Specifies the phone number range for this porting phone number block.
     */
    public function withPhoneNumberRange(
        PhoneNumberRange $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj->phone_number_range = $phoneNumberRange;

        return $obj;
    }

    /**
     * Specifies the phone number type for this porting phone number block.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $obj = clone $this;
        $obj['phone_number_type'] = $phoneNumberType;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
