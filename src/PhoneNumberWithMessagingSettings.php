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
 * @phpstan-type PhoneNumberWithMessagingSettingsShape = array{
 *   id?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   eligibleMessagingProducts?: list<string>|null,
 *   features?: Features|null,
 *   health?: NumberHealthMetrics|null,
 *   messagingProduct?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumber?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   trafficType?: string|null,
 *   type?: value-of<Type>|null,
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
     * @param list<string> $eligibleMessagingProducts
     * @param Features|array{
     *   mms?: MessagingFeatureSet|null, sms?: MessagingFeatureSet|null
     * } $features
     * @param NumberHealthMetrics|array{
     *   inboundOutboundRatio: float,
     *   messageCount: int,
     *   spamRatio: float,
     *   successRatio: float,
     * } $health
     * @param RecordType|value-of<RecordType> $recordType
     * @param Type|value-of<Type> $type
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $countryCode && $obj['countryCode'] = $countryCode;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $eligibleMessagingProducts && $obj['eligibleMessagingProducts'] = $eligibleMessagingProducts;
        null !== $features && $obj['features'] = $features;
        null !== $health && $obj['health'] = $health;
        null !== $messagingProduct && $obj['messagingProduct'] = $messagingProduct;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $trafficType && $obj['trafficType'] = $trafficType;
        null !== $type && $obj['type'] = $type;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['countryCode'] = $countryCode;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['eligibleMessagingProducts'] = $eligibleMessagingProducts;

        return $obj;
    }

    /**
     * @param Features|array{
     *   mms?: MessagingFeatureSet|null, sms?: MessagingFeatureSet|null
     * } $features
     */
    public function withFeatures(Features|array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    /**
     * High level health metrics about the number and it's messaging sending patterns.
     *
     * @param NumberHealthMetrics|array{
     *   inboundOutboundRatio: float,
     *   messageCount: int,
     *   spamRatio: float,
     *   successRatio: float,
     * } $health
     */
    public function withHealth(NumberHealthMetrics|array $health): self
    {
        $obj = clone $this;
        $obj['health'] = $health;

        return $obj;
    }

    /**
     * The messaging product that the number is registered to use.
     */
    public function withMessagingProduct(string $messagingProduct): self
    {
        $obj = clone $this;
        $obj['messagingProduct'] = $messagingProduct;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * +E.164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

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
        $obj['trafficType'] = $trafficType;

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
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
