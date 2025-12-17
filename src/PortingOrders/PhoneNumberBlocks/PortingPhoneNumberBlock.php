<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberRange;
use Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberType;

/**
 * @phpstan-import-type ActivationRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\ActivationRange
 * @phpstan-import-type PhoneNumberRangeShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock\PhoneNumberRange
 *
 * @phpstan-type PortingPhoneNumberBlockShape = array{
 *   id?: string|null,
 *   activationRanges?: list<ActivationRangeShape>|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   phoneNumberRange?: null|PhoneNumberRange|PhoneNumberRangeShape,
 *   phoneNumberType?: null|PhoneNumberType|value-of<PhoneNumberType>,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PortingPhoneNumberBlock implements BaseModel
{
    /** @use SdkModel<PortingPhoneNumberBlockShape> */
    use SdkModel;

    /**
     * Uniquely identifies this porting phone number block.
     */
    #[Optional]
    public ?string $id;

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the phone number range and should not overlap with other activation ranges.
     *
     * @var list<ActivationRange>|null $activationRanges
     */
    #[Optional('activation_ranges', list: ActivationRange::class)]
    public ?array $activationRanges;

    /**
     * Specifies the country code for this porting phone number block. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies the phone number range for this porting phone number block.
     */
    #[Optional('phone_number_range')]
    public ?PhoneNumberRange $phoneNumberRange;

    /**
     * Specifies the phone number type for this porting phone number block.
     *
     * @var value-of<PhoneNumberType>|null $phoneNumberType
     */
    #[Optional('phone_number_type', enum: PhoneNumberType::class)]
    public ?string $phoneNumberType;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    #[Optional('updated_at')]
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
     * @param list<ActivationRangeShape>|null $activationRanges
     * @param PhoneNumberRange|PhoneNumberRangeShape|null $phoneNumberRange
     * @param PhoneNumberType|value-of<PhoneNumberType>|null $phoneNumberType
     */
    public static function with(
        ?string $id = null,
        ?array $activationRanges = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        PhoneNumberRange|array|null $phoneNumberRange = null,
        PhoneNumberType|string|null $phoneNumberType = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $activationRanges && $self['activationRanges'] = $activationRanges;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $phoneNumberRange && $self['phoneNumberRange'] = $phoneNumberRange;
        null !== $phoneNumberType && $self['phoneNumberType'] = $phoneNumberType;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Uniquely identifies this porting phone number block.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Specifies the activation ranges for this porting phone number block. The activation range must be within the phone number range and should not overlap with other activation ranges.
     *
     * @param list<ActivationRangeShape> $activationRanges
     */
    public function withActivationRanges(array $activationRanges): self
    {
        $self = clone $this;
        $self['activationRanges'] = $activationRanges;

        return $self;
    }

    /**
     * Specifies the country code for this porting phone number block. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $self = clone $this;
        $self['countryCode'] = $countryCode;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Specifies the phone number range for this porting phone number block.
     *
     * @param PhoneNumberRange|PhoneNumberRangeShape $phoneNumberRange
     */
    public function withPhoneNumberRange(
        PhoneNumberRange|array $phoneNumberRange
    ): self {
        $self = clone $this;
        $self['phoneNumberRange'] = $phoneNumberRange;

        return $self;
    }

    /**
     * Specifies the phone number type for this porting phone number block.
     *
     * @param PhoneNumberType|value-of<PhoneNumberType> $phoneNumberType
     */
    public function withPhoneNumberType(
        PhoneNumberType|string $phoneNumberType
    ): self {
        $self = clone $this;
        $self['phoneNumberType'] = $phoneNumberType;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
