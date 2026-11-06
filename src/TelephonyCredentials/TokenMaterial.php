<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * What a server needs to mint login tokens for the credential itself, with no request per token (`TelephonyCredential#to_jwt` in telnyx-ruby 3.1.0 or later). As sensitive as `sip_password`: keep it on the server.
 *
 * @phpstan-type TokenMaterialShape = array{
 *   kid?: string|null, signingSecret?: string|null, telToken?: string|null
 * }
 */
final class TokenMaterial implements BaseModel
{
    /** @use SdkModel<TokenMaterialShape> */
    use SdkModel;

    /**
     * Identifies the Telnyx signing key the `signing_secret` was derived with. Goes in the token header.
     */
    #[Optional]
    public ?string $kid;

    /**
     * The HMAC-SHA256 key the token is signed with, base64url without padding.
     */
    #[Optional('signing_secret')]
    public ?string $signingSecret;

    /**
     * Opaque value Telnyx uses to resolve the credential. Carried in the token's `tel_token` claim as is.
     */
    #[Optional('tel_token')]
    public ?string $telToken;

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
        ?string $kid = null,
        ?string $signingSecret = null,
        ?string $telToken = null
    ): self {
        $self = new self;

        null !== $kid && $self['kid'] = $kid;
        null !== $signingSecret && $self['signingSecret'] = $signingSecret;
        null !== $telToken && $self['telToken'] = $telToken;

        return $self;
    }

    /**
     * Identifies the Telnyx signing key the `signing_secret` was derived with. Goes in the token header.
     */
    public function withKid(string $kid): self
    {
        $self = clone $this;
        $self['kid'] = $kid;

        return $self;
    }

    /**
     * The HMAC-SHA256 key the token is signed with, base64url without padding.
     */
    public function withSigningSecret(string $signingSecret): self
    {
        $self = clone $this;
        $self['signingSecret'] = $signingSecret;

        return $self;
    }

    /**
     * Opaque value Telnyx uses to resolve the credential. Carried in the token's `tel_token` claim as is.
     */
    public function withTelToken(string $telToken): self
    {
        $self = clone $this;
        $self['telToken'] = $telToken;

        return $self;
    }
}
