<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingFeatureSet;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\Features;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\RecordType;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   country_code?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   features?: Features|null,
 *   messaging_product?: string|null,
 *   messaging_profile_id?: string|null,
 *   phone_number?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   traffic_type?: string|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 3166-1 alpha-2 country code.
     */
    #[Api(optional: true)]
    public ?string $country_code;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    #[Api(optional: true)]
    public ?Features $features;

    /**
     * The messaging product that the number is registered to use.
     */
    #[Api(optional: true)]
    public ?string $messaging_product;

    /**
     * Unique identifier for a messaging profile.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $messaging_profile_id;

    /**
     * +E.164 formatted phone number.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * The messaging traffic or use case for which the number is currently configured.
     */
    #[Api(optional: true)]
    public ?string $traffic_type;

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
     * @param Features|array{sms?: MessagingFeatureSet|null} $features
     * @param RecordType|value-of<RecordType> $record_type
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $country_code = null,
        ?\DateTimeInterface $created_at = null,
        Features|array|null $features = null,
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
        null !== $features && $obj['features'] = $features;
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
     * @param Features|array{sms?: MessagingFeatureSet|null} $features
     */
    public function withFeatures(Features|array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

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
