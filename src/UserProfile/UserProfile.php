<?php

declare(strict_types=1);

namespace Telnyx\UserProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\UserProfile\UserProfile\DataLocality;
use Telnyx\UserProfile\UserProfile\DataLocalityMigrationStatus;
use Telnyx\UserProfile\UserProfile\RecordType;

/**
 * The authenticated user's profile.
 *
 * @phpstan-type UserProfileShape = array{
 *   id?: int|null,
 *   address1?: string|null,
 *   address2?: string|null,
 *   businessName?: string|null,
 *   city?: string|null,
 *   country?: string|null,
 *   dataLocality?: null|DataLocality|value-of<DataLocality>,
 *   dataLocalityMigrationStatus?: null|DataLocalityMigrationStatus|value-of<DataLocalityMigrationStatus>,
 *   dataLocalityUpdatedAt?: \DateTimeInterface|null,
 *   firstName?: string|null,
 *   lastName?: string|null,
 *   phoneNumber?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   state?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   zip?: string|null,
 * }
 */
final class UserProfile implements BaseModel
{
    /** @use SdkModel<UserProfileShape> */
    use SdkModel;

    /**
     * Identifier of the user profile, distinct from the user ID.
     */
    #[Optional]
    public ?int $id;

    /**
     * First line of the profile address.
     */
    #[Optional('address_1', nullable: true)]
    public ?string $address1;

    /**
     * Second line of the profile address.
     */
    #[Optional('address_2', nullable: true)]
    public ?string $address2;

    /**
     * Business name associated with the profile.
     */
    #[Optional('business_name', nullable: true)]
    public ?string $businessName;

    /**
     * City in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $city;

    /**
     * Country code in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $country;

    /**
     * The user's data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada).
     *
     * @var value-of<DataLocality>|null $dataLocality
     */
    #[Optional('data_locality', enum: DataLocality::class, nullable: true)]
    public ?string $dataLocality;

    /**
     * Status of the user's data locality migration, or null when no migration status is recorded.
     *
     * @var value-of<DataLocalityMigrationStatus>|null $dataLocalityMigrationStatus
     */
    #[Optional(
        'data_locality_migration_status',
        enum: DataLocalityMigrationStatus::class,
        nullable: true,
    )]
    public ?string $dataLocalityMigrationStatus;

    /**
     * Timestamp when the user's data locality was last changed, or null if it has not been changed.
     */
    #[Optional('data_locality_updated_at', nullable: true)]
    public ?\DateTimeInterface $dataLocalityUpdatedAt;

    /**
     * The user's first name.
     */
    #[Optional('first_name', nullable: true)]
    public ?string $firstName;

    /**
     * The user's last name.
     */
    #[Optional('last_name', nullable: true)]
    public ?string $lastName;

    /**
     * Contact phone number associated with the profile.
     */
    #[Optional('phone_number', nullable: true)]
    public ?string $phoneNumber;

    /**
     * Identifies the type of resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * State or region in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $state;

    /**
     * Timestamp of the most recent profile update.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * Identifier of the user who owns this profile.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Postal code in the profile address.
     */
    #[Optional(nullable: true)]
    public ?string $zip;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Omitted|DataLocality|value-of<DataLocality>|null $dataLocality
     * @param Omitted|DataLocalityMigrationStatus|value-of<DataLocalityMigrationStatus>|null $dataLocalityMigrationStatus
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        string|Omitted|null $address1 = Omitted::VALUE,
        string|Omitted|null $address2 = Omitted::VALUE,
        string|Omitted|null $businessName = Omitted::VALUE,
        string|Omitted|null $city = Omitted::VALUE,
        string|Omitted|null $country = Omitted::VALUE,
        Omitted|DataLocality|string|null $dataLocality = Omitted::VALUE,
        Omitted|DataLocalityMigrationStatus|string|null $dataLocalityMigrationStatus = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $dataLocalityUpdatedAt = Omitted::VALUE,
        string|Omitted|null $firstName = Omitted::VALUE,
        string|Omitted|null $lastName = Omitted::VALUE,
        string|Omitted|null $phoneNumber = Omitted::VALUE,
        string|Omitted|null $state = Omitted::VALUE,
        string|Omitted|null $zip = Omitted::VALUE,
        ?int $id = null,
        RecordType|string|null $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        Omitted::VALUE !== $address1 && $self['address1'] = $address1;
        Omitted::VALUE !== $address2 && $self['address2'] = $address2;
        Omitted::VALUE !== $businessName && $self['businessName'] = $businessName;
        Omitted::VALUE !== $city && $self['city'] = $city;
        Omitted::VALUE !== $country && $self['country'] = $country;
        Omitted::VALUE !== $dataLocality && $self['dataLocality'] = $dataLocality;
        Omitted::VALUE !== $dataLocalityMigrationStatus && $self['dataLocalityMigrationStatus'] = $dataLocalityMigrationStatus;
        Omitted::VALUE !== $dataLocalityUpdatedAt && $self['dataLocalityUpdatedAt'] = $dataLocalityUpdatedAt;
        Omitted::VALUE !== $firstName && $self['firstName'] = $firstName;
        Omitted::VALUE !== $lastName && $self['lastName'] = $lastName;
        Omitted::VALUE !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        Omitted::VALUE !== $state && $self['state'] = $state;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;
        Omitted::VALUE !== $zip && $self['zip'] = $zip;

        return $self;
    }

    /**
     * Identifier of the user profile, distinct from the user ID.
     */
    public function withID(int $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * First line of the profile address.
     */
    public function withAddress1(?string $address1): self
    {
        $self = clone $this;
        $self['address1'] = $address1;

        return $self;
    }

    /**
     * Second line of the profile address.
     */
    public function withAddress2(?string $address2): self
    {
        $self = clone $this;
        $self['address2'] = $address2;

        return $self;
    }

    /**
     * Business name associated with the profile.
     */
    public function withBusinessName(?string $businessName): self
    {
        $self = clone $this;
        $self['businessName'] = $businessName;

        return $self;
    }

    /**
     * City in the profile address.
     */
    public function withCity(?string $city): self
    {
        $self = clone $this;
        $self['city'] = $city;

        return $self;
    }

    /**
     * Country code in the profile address.
     */
    public function withCountry(?string $country): self
    {
        $self = clone $this;
        $self['country'] = $country;

        return $self;
    }

    /**
     * The user's data locality: USA (United States), DEU (Germany), AUS (Australia), UAE (United Arab Emirates), or CAN (Canada).
     *
     * @param DataLocality|value-of<DataLocality>|null $dataLocality
     */
    public function withDataLocality(
        DataLocality|string|null $dataLocality
    ): self {
        $self = clone $this;
        $self['dataLocality'] = $dataLocality;

        return $self;
    }

    /**
     * Status of the user's data locality migration, or null when no migration status is recorded.
     *
     * @param DataLocalityMigrationStatus|value-of<DataLocalityMigrationStatus>|null $dataLocalityMigrationStatus
     */
    public function withDataLocalityMigrationStatus(
        DataLocalityMigrationStatus|string|null $dataLocalityMigrationStatus
    ): self {
        $self = clone $this;
        $self['dataLocalityMigrationStatus'] = $dataLocalityMigrationStatus;

        return $self;
    }

    /**
     * Timestamp when the user's data locality was last changed, or null if it has not been changed.
     */
    public function withDataLocalityUpdatedAt(
        ?\DateTimeInterface $dataLocalityUpdatedAt
    ): self {
        $self = clone $this;
        $self['dataLocalityUpdatedAt'] = $dataLocalityUpdatedAt;

        return $self;
    }

    /**
     * The user's first name.
     */
    public function withFirstName(?string $firstName): self
    {
        $self = clone $this;
        $self['firstName'] = $firstName;

        return $self;
    }

    /**
     * The user's last name.
     */
    public function withLastName(?string $lastName): self
    {
        $self = clone $this;
        $self['lastName'] = $lastName;

        return $self;
    }

    /**
     * Contact phone number associated with the profile.
     */
    public function withPhoneNumber(?string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Identifies the type of resource.
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
     * State or region in the profile address.
     */
    public function withState(?string $state): self
    {
        $self = clone $this;
        $self['state'] = $state;

        return $self;
    }

    /**
     * Timestamp of the most recent profile update.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifier of the user who owns this profile.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Postal code in the profile address.
     */
    public function withZip(?string $zip): self
    {
        $self = clone $this;
        $self['zip'] = $zip;

        return $self;
    }
}
