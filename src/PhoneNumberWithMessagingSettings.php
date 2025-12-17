<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberWithMessagingSettings\Features;
use Telnyx\PhoneNumberWithMessagingSettings\RecordType;
use Telnyx\PhoneNumberWithMessagingSettings\Type;

/**
 * @phpstan-import-type FeaturesShape from \Telnyx\PhoneNumberWithMessagingSettings\Features
 * @phpstan-import-type NumberHealthMetricsShape from \Telnyx\NumberHealthMetrics
 *
 * @phpstan-type PhoneNumberWithMessagingSettingsShape = array{
 *   id?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   eligibleMessagingProducts?: list<string>|null,
 *   features?: null|Features|FeaturesShape,
 *   health?: null|NumberHealthMetrics|NumberHealthMetricsShape,
 *   messagingProduct?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumber?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   trafficType?: string|null,
 *   type?: null|Type|value-of<Type>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PhoneNumberWithMessagingSettings implements BaseModel
{
    /** @use SdkModel<PhoneNumberWithMessagingSettingsShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    #[Optional('country_code')]
    public ?string $countryCode;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The messaging products that this number can be registered to use.
     *
     * @var list<string>|null $eligibleMessagingProducts
     */
    #[Optional('eligible_messaging_products', list: 'string')]
    public ?array $eligibleMessagingProducts;

    #[Optional]
    public ?Features $features;

    /**
     * High level health metrics about the number and it's messaging sending patterns.
     */
    #[Optional]
    public ?NumberHealthMetrics $health;

    /**
     * The messaging product that the number is registered to use.
     */
    #[Optional('messaging_product')]
    public ?string $messagingProduct;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Optional('messaging_profile_id', nullable: true)]
    public ?string $messagingProfileID;

    /**
     * +E.164 formatted phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    #[Optional('traffic_type')]
    public ?string $trafficType;

    /**
     * The type of the phone number.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
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
     * @param list<string>|null $eligibleMessagingProducts
     * @param Features|FeaturesShape|null $features
     * @param NumberHealthMetrics|NumberHealthMetricsShape|null $health
     * @param RecordType|value-of<RecordType>|null $recordType
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        ?string $id = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $eligibleMessagingProducts = null,
        Features|array|null $features = null,
        NumberHealthMetrics|array|null $health = null,
        ?string $messagingProduct = null,
        ?string $messagingProfileID = null,
        ?string $phoneNumber = null,
        RecordType|string|null $recordType = null,
        ?string $trafficType = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $countryCode && $self['countryCode'] = $countryCode;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $eligibleMessagingProducts && $self['eligibleMessagingProducts'] = $eligibleMessagingProducts;
        null !== $features && $self['features'] = $features;
        null !== $health && $self['health'] = $health;
        null !== $messagingProduct && $self['messagingProduct'] = $messagingProduct;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $trafficType && $self['trafficType'] = $trafficType;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * ISO 3166-1 alpha-2 country code.
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
     * The messaging products that this number can be registered to use.
     *
     * @param list<string> $eligibleMessagingProducts
     */
    public function withEligibleMessagingProducts(
        array $eligibleMessagingProducts
    ): self {
        $self = clone $this;
        $self['eligibleMessagingProducts'] = $eligibleMessagingProducts;

        return $self;
    }

    /**
     * @param Features|FeaturesShape $features
     */
    public function withFeatures(Features|array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    /**
     * High level health metrics about the number and it's messaging sending patterns.
     *
     * @param NumberHealthMetrics|NumberHealthMetricsShape $health
     */
    public function withHealth(NumberHealthMetrics|array $health): self
    {
        $self = clone $this;
        $self['health'] = $health;

        return $self;
    }

    /**
     * The messaging product that the number is registered to use.
     */
    public function withMessagingProduct(string $messagingProduct): self
    {
        $self = clone $this;
        $self['messagingProduct'] = $messagingProduct;

        return $self;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * +E.164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    public function withTrafficType(string $trafficType): self
    {
        $self = clone $this;
        $self['trafficType'] = $trafficType;

        return $self;
    }

    /**
     * The type of the phone number.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
