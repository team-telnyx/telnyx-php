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
 * @phpstan-type porting_phone_number_block = array{
 *   id?: string,
 *   activationRanges?: list<ActivationRange>,
 *   countryCode?: string,
 *   createdAt?: \DateTimeInterface,
 *   phoneNumberRange?: PhoneNumberRange,
 *   phoneNumberType?: value-of<PhoneNumberType>,
 *   recordType?: string,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PortingPhoneNumberBlock implements BaseModel
{
    /** @use SdkModel<porting_phone_number_block> */
    use SdkModel;

    /**
     * Uniquely identifies this porting phone number block.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the phone number range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange>|null $activationRanges
     */
    #[Api('activation_ranges', list: ActivationRange::class, optional: true)]
    public ?array $activationRanges;

    /**
     * Specifies the country code for this porting phone number block. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies the phone number range for this porting phone number block.
     */
    #[Api('phone_number_range', optional: true)]
    public ?PhoneNumberRange $phoneNumberRange;

    /**
     * Specifies the phone number type for this porting phone number block.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Api('phone_number_type', enum: PhoneNumberType::class, optional: true)]
    public ?string $phoneNumberType;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ActivationRange> $activationRanges
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public static function with(
        ?string $id = null,
        ?array $activationRanges = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?PhoneNumberRange $phoneNumberRange = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $activationRanges && $obj->activationRanges = $activationRanges;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $phoneNumberRange && $obj->phoneNumberRange = $phoneNumberRange;
        null !== $phoneNumberType && $obj['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
        $obj->activationRanges = $activationRanges;

        return $obj;
    }

    /**
     * Specifies the country code for this porting phone number block. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

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
     * Specifies the phone number range for this porting phone number block.
     */
    public function withPhoneNumberRange(
        PhoneNumberRange $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj->phoneNumberRange = $phoneNumberRange;

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
        $obj['phoneNumberType'] = $phoneNumberType;

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
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
