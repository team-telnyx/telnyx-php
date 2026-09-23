<?php

declare(strict_types=1);

namespace Telnyx\BotSignup;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Resends the one-time sign-in (magic) link for an eligible bot signup account. Eligibility (account exists, was registered through bot signup, is active, and has not exceeded the resend limit or rate window) is evaluated server-side; the response is intentionally uniform and does not reveal whether the account exists or whether a link was actually sent. This endpoint is public and unauthenticated, gated by the freemium feature flags and per-country availability.
 *
 * @see Telnyx\Services\BotSignupService::resendMagicLink()
 *
 * @phpstan-type BotSignupResendMagicLinkParamsShape = array{email: string}
 */
final class BotSignupResendMagicLinkParams implements BaseModel
{
    /** @use SdkModel<BotSignupResendMagicLinkParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Email address of the bot signup account to resend the magic link to.
     */
    #[Required]
    public string $email;

    /**
     * `new BotSignupResendMagicLinkParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BotSignupResendMagicLinkParams::with(email: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BotSignupResendMagicLinkParams)->withEmail(...)
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
     */
    public static function with(string $email): self
    {
        $self = new self;

        $self['email'] = $email;

        return $self;
    }

    /**
     * Email address of the bot signup account to resend the magic link to.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }
}
