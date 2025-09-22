<?php

declare(strict_types=1);

namespace Telnyx\Client\OAuth;

use Telnyx\Client\OAuth\OAuthGetJwksResponse\Key;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type oauth_get_jwks_response = array{keys?: list<Key>}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class OAuthGetJwksResponse implements BaseModel
{
    /** @use SdkModel<oauth_get_jwks_response> */
    use SdkModel;

    /** @var list<Key>|null $keys */
    #[Api(list: Key::class, optional: true)]
    public ?array $keys;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Key> $keys
     */
    public static function with(?array $keys = null): self
    {
        $obj = new self;

        null !== $keys && $obj->keys = $keys;

        return $obj;
    }

    /**
     * @param list<Key> $keys
     */
    public function withKeys(array $keys): self
    {
        $obj = clone $this;
        $obj->keys = $keys;

        return $obj;
    }
}
