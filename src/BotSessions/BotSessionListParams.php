<?php

declare(strict_types=1);

namespace Telnyx\BotSessions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consumes the one-time portal redirect (magic link) token emailed during bot signup and returns an API session. The token is a UUIDv7 that encodes its creation time; it expires after a configurable validity window (15 minutes by default) and is cleared on first use. Although the action creates a session, the route uses the GET verb because it is opened from an email link. On first use the account is also initialized. For bot signup (freemium) accounts the response is a minimal envelope containing only the `api_v2_token`; accounts that are permitted to use magic links but are not freemium accounts may instead receive an extended session payload when additional steps (such as two-factor authentication or identity verification) are required. This endpoint is public; the magic link token in the query string is the credential.
 *
 * @see Telnyx\Services\BotSessionsService::list()
 *
 * @phpstan-type BotSessionListParamsShape = array{
 *   email: string, portalRedirectToken: string
 * }
 */
final class BotSessionListParams implements BaseModel
{
    /** @use SdkModel<BotSessionListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Email address associated with the magic link token.
     */
    #[Required]
    public string $email;

    /**
     * Single-use portal redirect (magic link) token, a UUIDv7 sent to the account owner's email.
     */
    #[Required]
    public string $portalRedirectToken;

    /**
     * `new BotSessionListParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BotSessionListParams::with(email: ..., portalRedirectToken: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BotSessionListParams)->withEmail(...)->withPortalRedirectToken(...)
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
    public static function with(
        string $email,
        string $portalRedirectToken
    ): self {
        $self = new self;

        $self['email'] = $email;
        $self['portalRedirectToken'] = $portalRedirectToken;

        return $self;
    }

    /**
     * Email address associated with the magic link token.
     */
    public function withEmail(string $email): self
    {
        $self = clone $this;
        $self['email'] = $email;

        return $self;
    }

    /**
     * Single-use portal redirect (magic link) token, a UUIDv7 sent to the account owner's email.
     */
    public function withPortalRedirectToken(string $portalRedirectToken): self
    {
        $self = clone $this;
        $self['portalRedirectToken'] = $portalRedirectToken;

        return $self;
    }
}
