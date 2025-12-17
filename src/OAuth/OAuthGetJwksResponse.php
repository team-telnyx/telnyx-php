<?php

declare(strict_types=1);

namespace Telnyx\OAuth;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\OAuth\OAuthGetJwksResponse\Key;

/**
 * @phpstan-import-type KeyShape from \Telnyx\OAuth\OAuthGetJwksResponse\Key
 *
 * @phpstan-type OAuthGetJwksResponseShape = array{keys?: list<KeyShape>|null}
 */
final class OAuthGetJwksResponse implements BaseModel
{
    /** @use SdkModel<OAuthGetJwksResponseShape> */
    use SdkModel;

    /** @var list<Key>|null $keys */
    #[Optional(list: Key::class)]
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
     * @param list<KeyShape>|null $keys
     */
    public static function with(?array $keys = null): self
    {
        $self = new self;

        null !== $keys && $self['keys'] = $keys;

        return $self;
    }

    /**
     * @param list<KeyShape> $keys
     */
    public function withKeys(array $keys): self
    {
        $self = clone $this;
        $self['keys'] = $keys;

        return $self;
    }
}
