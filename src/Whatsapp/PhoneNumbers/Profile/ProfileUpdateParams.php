<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\Profile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update phone number business profile.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbers\ProfileService::update()
 *
 * @phpstan-type ProfileUpdateParamsShape = array{
 *   about?: string|null,
 *   address?: string|null,
 *   category?: string|null,
 *   description?: string|null,
 *   displayName?: string|null,
 *   email?: string|null,
 *   website?: string|null,
 * }
 */
final class ProfileUpdateParams implements BaseModel
{
    /** @use SdkModel<ProfileUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $about;

    #[Optional]
    public ?string $address;

    #[Optional]
    public ?string $category;

    #[Optional]
    public ?string $description;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional]
    public ?string $email;

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
        ?string $about = null,
        ?string $address = null,
        ?string $category = null,
        ?string $description = null,
        ?string $displayName = null,
        ?string $email = null,
        ?string $website = null,
    ): self {
        $self = new self;

        null !== $about && $self['about'] = $about;
        null !== $address && $self['address'] = $address;
        null !== $category && $self['category'] = $category;
        null !== $description && $self['description'] = $description;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $email && $self['email'] = $email;
        null !== $website && $self['website'] = $website;

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

    public function withWebsite(string $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
