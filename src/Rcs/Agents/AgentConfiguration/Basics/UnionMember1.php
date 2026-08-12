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
 * @phpstan-import-type AgentWebsiteContactShape from \Telnyx\Rcs\Agents\AgentWebsiteContact
 * @phpstan-import-type AgentEmailContactShape from \Telnyx\Rcs\Agents\AgentEmailContact
 * @phpstan-import-type AgentPhoneContactShape from \Telnyx\Rcs\Agents\AgentPhoneContact
 *
 * @phpstan-type UnionMember1Shape = array{
 *   website: AgentWebsiteContact|AgentWebsiteContactShape,
 *   brandColor?: string|null,
 *   description?: string|null,
 *   email?: null|AgentEmailContact|AgentEmailContactShape,
 *   heroURL?: string|null,
 *   logoURL?: string|null,
 *   phoneNumber?: null|AgentPhoneContact|AgentPhoneContactShape,
 *   privacyPolicyURL?: string|null,
 *   termsAndConditionsURL?: string|null,
 * }
 */
final class UnionMember1 implements BaseModel
{
    /** @use SdkModel<UnionMember1Shape> */
    use SdkModel;

    #[Required]
    public AgentWebsiteContact $website;

    #[Optional('brand_color')]
    public ?string $brandColor;

    #[Optional]
    public ?string $description;

    #[Optional(nullable: true)]
    public ?AgentEmailContact $email;

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

    /**
     * `new UnionMember1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UnionMember1::with(website: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UnionMember1)->withWebsite(...)
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
     * @param AgentWebsiteContact|AgentWebsiteContactShape $website
     * @param AgentEmailContact|AgentEmailContactShape|null $email
     * @param AgentPhoneContact|AgentPhoneContactShape|null $phoneNumber
     */
    public static function with(
        AgentWebsiteContact|array $website,
        ?string $brandColor = null,
        ?string $description = null,
        AgentEmailContact|array|null $email = null,
        ?string $heroURL = null,
        ?string $logoURL = null,
        AgentPhoneContact|array|null $phoneNumber = null,
        ?string $privacyPolicyURL = null,
        ?string $termsAndConditionsURL = null,
    ): self {
        $self = new self;

        $self['website'] = $website;

        null !== $brandColor && $self['brandColor'] = $brandColor;
        null !== $description && $self['description'] = $description;
        null !== $email && $self['email'] = $email;
        null !== $heroURL && $self['heroURL'] = $heroURL;
        null !== $logoURL && $self['logoURL'] = $logoURL;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $privacyPolicyURL && $self['privacyPolicyURL'] = $privacyPolicyURL;
        null !== $termsAndConditionsURL && $self['termsAndConditionsURL'] = $termsAndConditionsURL;

        return $self;
    }

    /**
     * @param AgentWebsiteContact|AgentWebsiteContactShape $website
     */
    public function withWebsite(AgentWebsiteContact|array $website): self
    {
        $self = clone $this;
        $self['website'] = $website;

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

    /**
     * @param AgentEmailContact|AgentEmailContactShape|null $email
     */
    public function withEmail(AgentEmailContact|array|null $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

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
}
