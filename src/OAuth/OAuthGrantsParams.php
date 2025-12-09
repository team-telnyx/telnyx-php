<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create an OAuth authorization grant.
 *
 * @see Telnyx\Services\OAuthService::grants()
 *
 * @phpstan-type OAuthGrantsParamsShape = array{
 *   allowed: bool, consentToken: string
 * }
 */
final class OAuthGrantsParams implements BaseModel
{
    /** @use SdkModel<OAuthGrantsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Whether the grant is allowed.
     */
    #[Required]
    public bool $allowed;

    /**
     * Consent token.
     */
    #[Required('consent_token')]
    public string $consentToken;

    /**
     * `new OAuthGrantsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthGrantsParams::with(allowed: ..., consentToken: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthGrantsParams)->withAllowed(...)->withConsentToken(...)
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
    public static function with(bool $allowed, string $consentToken): self
    {
        $self = new self;

        $self['allowed'] = $allowed;
        $self['consentToken'] = $consentToken;

        return $self;
    }

    /**
     * Whether the grant is allowed.
     */
    public function withAllowed(bool $allowed): self
    {
        $self = clone $this;
        $self['allowed'] = $allowed;

        return $self;
    }

    /**
     * Consent token.
     */
    public function withConsentToken(string $consentToken): self
    {
        $self = clone $this;
        $self['consentToken'] = $consentToken;

        return $self;
    }
}
