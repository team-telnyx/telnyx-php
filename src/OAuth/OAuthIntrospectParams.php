<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Introspect an OAuth access token to check its validity and metadata.
 *
 * @see Telnyx\Services\OAuthService::introspect()
 *
 * @phpstan-type OAuthIntrospectParamsShape = array{token: string}
 */
final class OAuthIntrospectParams implements BaseModel
{
    /** @use SdkModel<OAuthIntrospectParamsShape> */
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
