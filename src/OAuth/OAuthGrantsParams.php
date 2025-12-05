<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create an OAuth authorization grant.
 *
 * @see Telnyx\Services\OAuthService::grants()
 *
 * @phpstan-type OAuthGrantsParamsShape = array{
 *   allowed: bool, consent_token: string
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
    #[Api]
    public bool $allowed;

    /**
     * Consent token.
     */
    #[Api]
    public string $consent_token;

    /**
     * `new OAuthGrantsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthGrantsParams::with(allowed: ..., consent_token: ...)
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
    public static function with(bool $allowed, string $consent_token): self
    {
        $obj = new self;

        $obj['allowed'] = $allowed;
        $obj['consent_token'] = $consent_token;

        return $obj;
    }

    /**
     * Whether the grant is allowed.
     */
    public function withAllowed(bool $allowed): self
    {
        $obj = clone $this;
        $obj['allowed'] = $allowed;

        return $obj;
    }

    /**
     * Consent token.
     */
    public function withConsentToken(string $consentToken): self
    {
        $obj = clone $this;
        $obj['consent_token'] = $consentToken;

        return $obj;
    }
}
