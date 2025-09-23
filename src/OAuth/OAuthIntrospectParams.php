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
 * $params = (new OAuthIntrospectParams); // set properties as needed
 * $client->oauth->introspect(...$params->toArray());
 * ```
 * Introspect an OAuth access token to check its validity and metadata.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->oauth->introspect(...$params->toArray());`
 *
 * @see Telnyx\OAuth->introspect
 *
 * @phpstan-type oauth_introspect_params = array{token: string}
 */
final class OAuthIntrospectParams implements BaseModel
{
    /** @use SdkModel<oauth_introspect_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The token to introspect.
     */
    #[Api]
    public string $token;

    /**
     * `new OAuthIntrospectParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthIntrospectParams::with(token: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthIntrospectParams)->withToken(...)
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
    public static function with(string $token): self
    {
        $obj = new self;

        $obj->token = $token;

        return $obj;
    }

    /**
     * The token to introspect.
     */
    public function withToken(string $token): self
    {
        $obj = clone $this;
        $obj->token = $token;

        return $obj;
    }
}
