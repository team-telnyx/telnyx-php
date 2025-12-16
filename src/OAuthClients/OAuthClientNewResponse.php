<?php

declare(strict_types=1);

namespace Telnyx\OAuthClients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OAuthClientShape from \Telnyx\OAuthClients\OAuthClient
 *
 * @phpstan-type OAuthClientNewResponseShape = array{
 *   data?: null|OAuthClient|OAuthClientShape
 * }
 */
final class OAuthClientNewResponse implements BaseModel
{
    /** @use SdkModel<OAuthClientNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OAuthClient $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OAuthClientShape $data
     */
    public static function with(OAuthClient|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OAuthClientShape $data
     */
    public function withData(OAuthClient|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
