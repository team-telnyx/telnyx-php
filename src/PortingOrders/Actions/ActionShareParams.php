<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\Actions\ActionShareParams\Permissions;

/**
 * Creates a sharing token for a porting order. The token can be used to share the porting order with non-Telnyx users.
 *
 * @see Telnyx\PortingOrders\Actions->share
 *
 * @phpstan-type action_share_params = array{
 *   expiresInSeconds?: int, permissions?: Permissions|value-of<Permissions>
 * }
 */
final class ActionShareParams implements BaseModel
{
    /** @use SdkModel<action_share_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The number of seconds the token will be valid for.
     */
    #[Api('expires_in_seconds', optional: true)]
    public ?int $expiresInSeconds;

    /**
     * The permissions the token will have.
     *
     * @var value-of<Permissions>|null $permissions
     */
    #[Api(enum: Permissions::class, optional: true)]
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
        $obj = new self;

        null !== $expiresInSeconds && $obj->expiresInSeconds = $expiresInSeconds;
        null !== $permissions && $obj['permissions'] = $permissions;

        return $obj;
    }

    /**
     * The number of seconds the token will be valid for.
     */
    public function withExpiresInSeconds(int $expiresInSeconds): self
    {
        $obj = clone $this;
        $obj->expiresInSeconds = $expiresInSeconds;

        return $obj;
    }

    /**
     * The permissions the token will have.
     *
     * @param Permissions|value-of<Permissions> $permissions
     */
    public function withPermissions(Permissions|string $permissions): self
    {
        $obj = clone $this;
        $obj['permissions'] = $permissions;

        return $obj;
    }
}
