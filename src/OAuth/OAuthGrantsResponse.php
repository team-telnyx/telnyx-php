<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type oauth_grants_response = array{redirectUri: string}
 */
final class OAuthGrantsResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<oauth_grants_response> */
    use SdkModel;

    use SdkResponse;

    /**
     * Redirect URI with authorization code or error.
     */
    #[Api('redirect_uri')]
    public string $redirectUri;

    /**
     * `new OAuthGrantsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * OAuthGrantsResponse::with(redirectUri: ...)
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
    public static function with(string $redirectUri): self
    {
        $obj = new self;

        $obj->redirectUri = $redirectUri;

        return $obj;
    }

    /**
     * Redirect URI with authorization code or error.
     */
    public function withRedirectUri(string $redirectUri): self
    {
        $obj = clone $this;
        $obj->redirectUri = $redirectUri;

        return $obj;
    }
}
