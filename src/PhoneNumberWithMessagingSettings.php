<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberWithMessagingSettings\Features;
use Telnyx\PhoneNumberWithMessagingSettings\RecordType;
use Telnyx\PhoneNumberWithMessagingSettings\Type;

/**
 * @phpstan-type phone_number_with_messaging_settings = array{
 *   id?: string,
 *   countryCode?: string,
 *   createdAt?: \DateTimeInterface,
 *   eligibleMessagingProducts?: list<string>,
 *   features?: Features,
 *   health?: NumberHealthMetrics,
 *   messagingProduct?: string,
 *   messagingProfileID?: string|null,
 *   phoneNumber?: string,
 *   recordType?: value-of<RecordType>,
 *   trafficType?: string,
 *   type?: value-of<Type>,
 *   updatedAt?: \DateTimeInterface,
 * }
 */
final class PhoneNumberWithMessagingSettings implements BaseModel
{
    /** @use SdkModel<phone_number_with_messaging_settings> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * The messaging products that this number can be registered to use.
     *
     * @var list<string>|null $eligibleMessagingProducts
     */
    #[Api('eligible_messaging_products', list: 'string', optional: true)]
    public ?array $eligibleMessagingProducts;

    #[Api(optional: true)]
    public ?Features $features;

    /**
     * High level health metrics about the number and it's messaging sending patterns.
     */
    #[Api(optional: true)]
    public ?NumberHealthMetrics $health;

    /**
     * The messaging product that the number is registered to use.
     */
    #[Api('messaging_product', optional: true)]
    public ?string $messagingProduct;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api('messaging_profile_id', nullable: true, optional: true)]
    public ?string $messagingProfileID;

    /**
     * +E.164 formatted phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
    public ?string $recordType;

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    #[Api('traffic_type', optional: true)]
    public ?string $trafficType;

    /**
     * The type of the phone number.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
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
     * @param list<string> $eligibleMessagingProducts
     * @param RecordType|value-of<RecordType> $recordType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $eligibleMessagingProducts = null,
        ?Features $features = null,
        ?NumberHealthMetrics $health = null,
        ?string $messagingProduct = null,
        ?string $messagingProfileID = null,
        ?string $phoneNumber = null,
        RecordType|string|null $recordType = null,
        ?string $trafficType = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $eligibleMessagingProducts && $obj->eligibleMessagingProducts = $eligibleMessagingProducts;
        null !== $features && $obj->features = $features;
        null !== $health && $obj->health = $health;
        null !== $messagingProduct && $obj->messagingProduct = $messagingProduct;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $trafficType && $obj->trafficType = $trafficType;
        null !== $type && $obj['type'] = $type;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code.
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
     * The messaging products that this number can be registered to use.
     *
     * @param list<string> $eligibleMessagingProducts
     */
    public function withEligibleMessagingProducts(
        array $eligibleMessagingProducts
    ): self {
        $obj = clone $this;
        $obj->eligibleMessagingProducts = $eligibleMessagingProducts;

        return $obj;
    }

    public function withFeatures(Features $features): self
    {
        $obj = clone $this;
        $obj->features = $features;

        return $obj;
    }

    /**
     * High level health metrics about the number and it's messaging sending patterns.
     */
    public function withHealth(NumberHealthMetrics $health): self
    {
        $obj = clone $this;
        $obj->health = $health;

        return $obj;
    }

    /**
     * The messaging product that the number is registered to use.
     */
    public function withMessagingProduct(string $messagingProduct): self
    {
        $obj = clone $this;
        $obj->messagingProduct = $messagingProduct;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * +E.164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    public function withTrafficType(string $trafficType): self
    {
        $obj = clone $this;
        $obj->trafficType = $trafficType;

        return $obj;
    }

    /**
     * The type of the phone number.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

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
}
