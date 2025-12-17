<?php

declare(strict_types=1);

namespace Telnyx\OAuthGrants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type OAuthGrantShape from \Telnyx\OAuthGrants\OAuthGrant
 *
 * @phpstan-type OAuthGrantDeleteResponseShape = array{
 *   data?: null|OAuthGrant|OAuthGrantShape
 * }
 */
final class OAuthGrantDeleteResponse implements BaseModel
{
    /** @use SdkModel<OAuthGrantDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?OAuthGrant $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param OAuthGrant|OAuthGrantShape|null $data
     */
    public static function with(OAuthGrant|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param OAuthGrant|OAuthGrantShape $data
     */
    public function withData(OAuthGrant|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
