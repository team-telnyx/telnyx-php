<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\Profile\ProfileUpdateResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   about?: string|null,
 *   address?: string|null,
 *   category?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   displayName?: string|null,
 *   email?: string|null,
 *   phoneNumberID?: string|null,
 *   profilePhotoURL?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   website?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $about;

    #[Optional]
    public ?string $address;

    #[Optional]
    public ?string $category;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional]
    public ?string $email;

    /**
     * Whatsapp phone number ID.
     */
    #[Optional('phone_number_id')]
    public ?string $phoneNumberID;

    #[Optional('profile_photo_url')]
    public ?string $profilePhotoURL;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $website;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $about = null,
        ?string $address = null,
        ?string $category = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $displayName = null,
        ?string $email = null,
        ?string $phoneNumberID = null,
        ?string $profilePhotoURL = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $about && $self['about'] = $about;
        null !== $address && $self['address'] = $address;
        null !== $category && $self['category'] = $category;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $email && $self['email'] = $email;
        null !== $phoneNumberID && $self['phoneNumberID'] = $phoneNumberID;
        null !== $profilePhotoURL && $self['profilePhotoURL'] = $profilePhotoURL;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAbout(string $about): self
    {
        $self = clone $this;
        $self['about'] = $about;

        return $self;
    }

    public function withAddress(string $address): self
    {
        $self = clone $this;
        $self['address'] = $address;

        return $self;
    }

    public function withCategory(string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Whatsapp phone number ID.
     */
    public function withPhoneNumberID(string $phoneNumberID): self
    {
        $self = clone $this;
        $self['phoneNumberID'] = $phoneNumberID;

        return $self;
    }

    public function withProfilePhotoURL(string $profilePhotoURL): self
    {
        $self = clone $this;
        $self['profilePhotoURL'] = $profilePhotoURL;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
