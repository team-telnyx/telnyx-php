<?php

declare(strict_types=1);

namespace Telnyx\AuthenticationProviders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AuthenticationProviderShape from \Telnyx\AuthenticationProviders\AuthenticationProvider
 *
 * @phpstan-type AuthenticationProviderUpdateResponseShape = array{
 *   data?: null|AuthenticationProvider|AuthenticationProviderShape
 * }
 */
final class AuthenticationProviderUpdateResponse implements BaseModel
{
    /** @use SdkModel<AuthenticationProviderUpdateResponseShape> */
    use SdkModel;

    #[Optional]
    public ?AuthenticationProvider $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AuthenticationProviderShape $data
     */
    public static function with(AuthenticationProvider|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param AuthenticationProviderShape $data
     */
    public function withData(AuthenticationProvider|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
