<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type oauth_grants_response = array{redirectUri: string}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class OAuthGrantsResponse implements BaseModel
{
    /** @use SdkModel<oauth_grants_response> */
    use SdkModel;

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
