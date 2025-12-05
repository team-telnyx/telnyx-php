<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\Action;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberRange;
use Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber\PhoneNumberType;

/**
 * @phpstan-type PortingAssociatedPhoneNumberShape = array{
 *   id?: string|null,
 *   action?: value-of<Action>|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   phone_number_range?: PhoneNumberRange|null,
 *   phone_number_type?: value-of<PhoneNumberType>|null,
 *   porting_order_id?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class PortingAssociatedPhoneNumber implements BaseModel
{
    /** @use SdkModel<PortingAssociatedPhoneNumberShape> */
    use SdkModel;

    /**
     * Uniquely identifies this associated phone number.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Specifies the action to take with this phone number during partial porting.
     *
     * @var value-of<Action>|null $action
     */
    #[Api(enum: Action::class, optional: true)]
    public ?string $action;

    /**
     * Specifies the country code for this associated phone number. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * Specifies the phone number range for this associated phone number.
     */
    #[Api(optional: true)]
    public ?PhoneNumberRange $phone_number_range;

    /**
     * Specifies the phone number type for this associated phone number.
     *
     * @var value-of<PhoneNumberType>|null $phone_number_type
     */
    #[Api(enum: PhoneNumberType::class, optional: true)]
    public ?string $phone_number_type;

    /**
     * Identifies the porting order associated with this phone number.
     */
    #[Api(optional: true)]
    public ?string $porting_order_id;

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
     * @param Action|value-of<Action> $action
     * @param PhoneNumberRange|array{
     *   end_at?: string|null, start_at?: string|null
     * } $phone_number_range
     * @param PhoneNumberType|value-of<PhoneNumberType> $phone_number_type
     */
    public static function with(
        ?string $id = null,
        Action|string|null $action = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        PhoneNumberRange|array|null $phone_number_range = null,
        PhoneNumberType|string|null $phone_number_type = null,
        ?string $porting_order_id = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action && $obj['action'] = $action;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $phone_number_range && $obj['phone_number_range'] = $phone_number_range;
        null !== $phone_number_type && $obj['phone_number_type'] = $phone_number_type;
        null !== $porting_order_id && $obj['porting_order_id'] = $porting_order_id;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Uniquely identifies this associated phone number.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Specifies the action to take with this phone number during partial porting.
     *
     * @param Action|value-of<Action> $action
     */
    public function withAction(Action|string $action): self
    {
        $obj = clone $this;
        $obj['action'] = $action;

        return $obj;
    }

    /**
     * Specifies the country code for this associated phone number. It is a two-letter ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

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
     * Specifies the phone number range for this associated phone number.
     *
     * @param PhoneNumberRange|array{
     *   end_at?: string|null, start_at?: string|null
     * } $phoneNumberRange
     */
    public function withPhoneNumberRange(
        PhoneNumberRange|array $phoneNumberRange
    ): self {
        $obj = clone $this;
        $obj['phone_number_range'] = $phoneNumberRange;

        return $obj;
    }

    /**
     * Specifies the phone number type for this associated phone number.
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
     * Identifies the porting order associated with this phone number.
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
     * ISO 8601 formatted date indicating when the resource was last updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
