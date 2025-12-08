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
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   eligible_messaging_products?: list<string>|null,
 *   features?: Features|null,
 *   health?: NumberHealthMetrics|null,
 *   messaging_product?: string|null,
 *   messaging_profile_id?: string|null,
 *   phone_number?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   traffic_type?: string|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: \DateTimeInterface|null,
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
    #[Optional]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * The messaging products that this number can be registered to use.
     *
     * @var list<string>|null $eligible_messaging_products
     */
    #[Optional(list: 'string')]
    public ?array $eligible_messaging_products;

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
    #[Optional]
    public ?string $messaging_product;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Optional(nullable: true)]
    public ?string $messaging_profile_id;

    /**
     * +E.164 formatted phone number.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    #[Optional]
    public ?string $traffic_type;

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
    #[Optional]
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
     * @param list<string> $eligible_messaging_products
     * @param Features|array{
     *   mms?: MessagingFeatureSet|null, sms?: MessagingFeatureSet|null
     * } $features
     * @param NumberHealthMetrics|array{
     *   inbound_outbound_ratio: float,
     *   message_count: int,
     *   spam_ratio: float,
     *   success_ratio: float,
     * } $health
     * @param RecordType|value-of<RecordType> $record_type
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        ?array $eligible_messaging_products = null,
        Features|array|null $features = null,
        NumberHealthMetrics|array|null $health = null,
        ?string $messaging_product = null,
        ?string $messaging_profile_id = null,
        ?string $phone_number = null,
        RecordType|string|null $record_type = null,
        ?string $traffic_type = null,
        Type|string|null $type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $eligible_messaging_products && $obj['eligible_messaging_products'] = $eligible_messaging_products;
        null !== $features && $obj['features'] = $features;
        null !== $health && $obj['health'] = $health;
        null !== $messaging_product && $obj['messaging_product'] = $messaging_product;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $traffic_type && $obj['traffic_type'] = $traffic_type;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

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
     * The messaging products that this number can be registered to use.
     *
     * @param list<string> $eligibleMessagingProducts
     */
    public function withEligibleMessagingProducts(
        array $eligibleMessagingProducts
    ): self {
        $obj = clone $this;
        $obj['eligible_messaging_products'] = $eligibleMessagingProducts;

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
     *   inbound_outbound_ratio: float,
     *   message_count: int,
     *   spam_ratio: float,
     *   success_ratio: float,
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
        $obj['messaging_product'] = $messagingProduct;

        return $obj;
    }

    /**
     * Unique identifier for a messaging profile.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * +E.164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

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
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    public function withTrafficType(string $trafficType): self
    {
        $obj = clone $this;
        $obj['traffic_type'] = $trafficType;

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
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
