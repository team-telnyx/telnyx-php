<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\OAuth\OAuthGetJwksResponse\Key;

/**
 * @phpstan-type OAuthGetJwksResponseShape = array{keys?: list<Key>|null}
 */
final class OAuthGetJwksResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<OAuthGetJwksResponseShape> */
    use SdkModel;

    use SdkResponse;

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
