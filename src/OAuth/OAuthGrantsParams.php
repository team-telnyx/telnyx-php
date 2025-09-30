<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new OAuthGrantsParams); // set properties as needed
 * $client->oauth->grants(...$params->toArray());
 * ```
 * Create an OAuth authorization grant.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->oauth->grants(...$params->toArray());`
 *
 * @see Telnyx\OAuth->grants
 *
 * @phpstan-type oauth_grants_params = array{allowed: bool, consentToken: string}
 */
final class OAuthGrantsParams implements BaseModel
{
    /** @use SdkModel<oauth_grants_params> */
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
    #[Api('consent_token')]
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
        $obj = new self;

        $obj->allowed = $allowed;
        $obj->consentToken = $consentToken;

        return $obj;
    }

    /**
     * Whether the grant is allowed.
     */
    public function withAllowed(bool $allowed): self
    {
        $obj = clone $this;
        $obj->allowed = $allowed;

        return $obj;
    }

    /**
     * Consent token.
     */
    public function withConsentToken(string $consentToken): self
    {
        $obj = clone $this;
        $obj->consentToken = $consentToken;

        return $obj;
    }
}
