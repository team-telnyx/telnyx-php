<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type OAuthGrantsResponseShape = array{redirect_uri: string}
 */
final class OAuthGrantsResponse implements BaseModel
{
    /** @use SdkModel<OAuthGrantsResponseShape> */
    use SdkModel;

    /**
     * Redirect URI with authorization code or error.
     */
    #[Required]
    public string $redirect_uri;

    /**
     * `new OAuthGrantsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthGrantsResponse::with(redirect_uri: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new OAuthGrantsResponse)->withRedirectUri(...)
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
    public static function with(string $redirect_uri): self
    {
        $obj = new self;

        $obj['redirect_uri'] = $redirect_uri;

        return $obj;
    }

    /**
     * Redirect URI with authorization code or error.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj['redirect_uri'] = $redirectUri;

        return $obj;
    }
}
