<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;

/**
 * Creates a sharing token for a porting order. The token can be used to share the porting order with non-Telnyx users.
 *
 * @see Telnyx\Services\PortingOrders\ActionsService::share()
 *
 * @phpstan-type ActionShareParamsShape = array{
 *   expiresInSeconds?: int|null,
 *   permissions?: null|Permissions|value-of<Permissions>,
 * }
 */
final class ActionShareParams implements BaseModel
{
    /** @use SdkModel<ActionShareParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of seconds the token will be valid for.
     */
    #[Optional('expires_in_seconds')]
    public ?int $expiresInSeconds;

    /**
     * The permissions the token will have.
     *
     * @var value-of<Permissions>|null $permissions
     */
    #[Optional(enum: Permissions::class)]
    public ?string $permissions;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Permissions|value-of<Permissions> $permissions
     */
    public static function with(
        ?int $expiresInSeconds = null,
        Permissions|string|null $permissions = null
    ): self {
        $self = new self;

        null !== $expiresInSeconds && $self['expiresInSeconds'] = $expiresInSeconds;
        null !== $permissions && $self['permissions'] = $permissions;

        return $self;
    }

    /**
     * The number of seconds the token will be valid for.
     */
    public function withExpiresInSeconds(int $expiresInSeconds): self
    {
        $self = clone $this;
        $self['expiresInSeconds'] = $expiresInSeconds;

        return $self;
    }

    /**
     * The permissions the token will have.
     *
     * @param Permissions|value-of<Permissions> $permissions
     */
    public function withPermissions(Permissions|string $permissions): self
    {
        $self = clone $this;
        $self['permissions'] = $permissions;

        return $self;
    }
}
