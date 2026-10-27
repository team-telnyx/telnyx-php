<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\HostedSignups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\HostedSignups\HostedSignupCreateParams\SignupType;

/**
 * Create a time-limited onboarding URL on the Telnyx-hosted Embedded Signup page for a Tech Provider's end customer. Set `signup_type` to `coexistence` to launch Meta's WhatsApp Business app coexistence flow instead of standard Cloud API onboarding.
 *
 * @see Telnyx\Services\Whatsapp\HostedSignupsService::create()
 *
 * @phpstan-type HostedSignupCreateParamsShape = array{
 *   appID: string,
 *   expiresAt?: \DateTimeInterface|null,
 *   signupType?: null|SignupType|value-of<SignupType>,
 * }
 */
final class HostedSignupCreateParams implements BaseModel
{
    /** @use SdkModel<HostedSignupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Meta App ID linked to the Telnyx account or its manager account. The app must be enabled.
     */
    #[Required('app_id')]
    public string $appID;

    /**
     * When the onboarding URL expires, in RFC 3339 format. Must be in the future and at most 3 days ahead. Defaults to 24 hours after creation.
     */
    #[Optional('expires_at')]
    public ?\DateTimeInterface $expiresAt;

    /**
     * Onboarding flow the hosted page launches. Use `coexistence` for a number that remains active in the WhatsApp Business app.
     *
     * @var value-of<SignupType>|null $signupType
     */
    #[Optional('signup_type', enum: SignupType::class)]
    public ?string $signupType;

    /**
     * `new HostedSignupCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HostedSignupCreateParams::with(appID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HostedSignupCreateParams)->withAppID(...)
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
     * @param SignupType|value-of<SignupType>|null $signupType
     */
    public static function with(
        string $appID,
        ?\DateTimeInterface $expiresAt = null,
        SignupType|string|null $signupType = null,
    ): self {
        $self = new self;

        $self['appID'] = $appID;

        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $signupType && $self['signupType'] = $signupType;

        return $self;
    }

    /**
     * Meta App ID linked to the Telnyx account or its manager account. The app must be enabled.
     */
    public function withAppID(string $appID): self
    {
        $self = clone $this;
        $self['appID'] = $appID;

        return $self;
    }

    /**
     * When the onboarding URL expires, in RFC 3339 format. Must be in the future and at most 3 days ahead. Defaults to 24 hours after creation.
     */
    public function withExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * Onboarding flow the hosted page launches. Use `coexistence` for a number that remains active in the WhatsApp Business app.
     *
     * @param SignupType|value-of<SignupType> $signupType
     */
    public function withSignupType(SignupType|string $signupType): self
    {
        $self = clone $this;
        $self['signupType'] = $signupType;

        return $self;
    }
}
