<?php

declare(strict_types=1);

namespace Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingFeatureSet;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\Features;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\RecordType;
use Telnyx\MobilePhoneNumbers\Messaging\MessagingListResponse\Data\Type;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   countryCode?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   features?: Features|null,
 *   messagingProduct?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumber?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   trafficType?: string|null,
 *   type?: value-of<Type>|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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

    #[Optional]
    public ?Features $features;

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
     * @param Features|array{sms?: MessagingFeatureSet|null} $features
     * @param RecordType|value-of<RecordType> $recordType
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $countryCode = null,
        ?\DateTimeInterface $createdAt = null,
        Features|array|null $features = null,
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
        null !== $features && $obj['features'] = $features;
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
