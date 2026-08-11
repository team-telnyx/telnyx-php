<?php

declare(strict_types=1);

namespace Telnyx\Rcs\Agents\AgentConfiguration\Basics;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rcs\Agents\AgentEmailContact;
use Telnyx\Rcs\Agents\AgentPhoneContact;
use Telnyx\Rcs\Agents\AgentWebsiteContact;

/**
 * @phpstan-import-type AgentEmailContactShape from \Telnyx\Rcs\Agents\AgentEmailContact
 * @phpstan-import-type AgentPhoneContactShape from \Telnyx\Rcs\Agents\AgentPhoneContact
 * @phpstan-import-type AgentWebsiteContactShape from \Telnyx\Rcs\Agents\AgentWebsiteContact
 *
 * @phpstan-type UnionMember2Shape = array{
 *   email: AgentEmailContact|AgentEmailContactShape,
 *   brandColor?: string|null,
 *   description?: string|null,
 *   heroURL?: string|null,
 *   logoURL?: string|null,
 *   phoneNumber?: null|AgentPhoneContact|AgentPhoneContactShape,
 *   privacyPolicyURL?: string|null,
 *   termsAndConditionsURL?: string|null,
 *   website?: null|AgentWebsiteContact|AgentWebsiteContactShape,
 * }
 */
final class UnionMember2 implements BaseModel
{
    /** @use SdkModel<UnionMember2Shape> */
    use SdkModel;

    #[Required]
    public AgentEmailContact $email;

    #[Optional('brand_color')]
    public ?string $brandColor;

    #[Optional]
    public ?string $description;

    #[Optional('hero_url')]
    public ?string $heroURL;

    #[Optional('logo_url')]
    public ?string $logoURL;

    #[Optional('phone_number', nullable: true)]
    public ?AgentPhoneContact $phoneNumber;

    #[Optional('privacy_policy_url')]
    public ?string $privacyPolicyURL;

    #[Optional('terms_and_conditions_url')]
    public ?string $termsAndConditionsURL;

    #[Optional(nullable: true)]
    public ?AgentWebsiteContact $website;

    /**
     * `new UnionMember2()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember2::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember2)->withEmail(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AgentEmailContact|AgentEmailContactShape $email
     * @param AgentPhoneContact|AgentPhoneContactShape|null $phoneNumber
     * @param AgentWebsiteContact|AgentWebsiteContactShape|null $website
     */
    public static function with(
        AgentEmailContact|array $email,
        ?string $brandColor = null,
        ?string $description = null,
        ?string $heroURL = null,
        ?string $logoURL = null,
        AgentPhoneContact|array|null $phoneNumber = null,
        ?string $privacyPolicyURL = null,
        ?string $termsAndConditionsURL = null,
        AgentWebsiteContact|array|null $website = null,
    ): self {
        $self = new self;

        $self['email'] = $email;

        null !== $brandColor && $self['brandColor'] = $brandColor;
        null !== $description && $self['description'] = $description;
        null !== $heroURL && $self['heroURL'] = $heroURL;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $privacyPolicyURL && $self['privacyPolicyURL'] = $privacyPolicyURL;
        null !== $termsAndConditionsURL && $self['termsAndConditionsURL'] = $termsAndConditionsURL;
        null !== $website && $self['website'] = $website;

        return $self;
    }

    /**
     * @param AgentEmailContact|AgentEmailContactShape $email
     */
    public function withEmail(AgentEmailContact|array $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    public function withBrandColor(string $brandColor): self
    {
        $self = clone $this;
        $self['brandColor'] = $brandColor;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withHeroURL(string $heroURL): self
    {
        $self = clone $this;
        $self['heroURL'] = $heroURL;

        return $self;
    }

    public function withLogoURL(string $logoURL): self
    {
        $self = clone $this;
        $self['logoURL'] = $logoURL;

        return $self;
    }

    /**
     * @param AgentPhoneContact|AgentPhoneContactShape|null $phoneNumber
     */
    public function withPhoneNumber(
        AgentPhoneContact|array|null $phoneNumber
    ): self {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withPrivacyPolicyURL(string $privacyPolicyURL): self
    {
        $self = clone $this;
        $self['privacyPolicyURL'] = $privacyPolicyURL;

        return $self;
    }

    public function withTermsAndConditionsURL(
        string $termsAndConditionsURL
    ): self {
        $self = clone $this;
        $self['termsAndConditionsURL'] = $termsAndConditionsURL;

        return $self;
    }

    /**
     * @param AgentWebsiteContact|AgentWebsiteContactShape|null $website
     */
    public function withWebsite(AgentWebsiteContact|array|null $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

        return $self;
    }
}
