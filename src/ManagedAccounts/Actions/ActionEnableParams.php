<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Enables a managed account and its sub-users to use Telnyx services.
 *
 * @see Telnyx\Services\ManagedAccounts\ActionsService::enable()
 *
 * @phpstan-type ActionEnableParamsShape = array{reenable_all_connections?: bool}
 */
final class ActionEnableParams implements BaseModel
{
    /** @use SdkModel<ActionEnableParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     */
    #[Optional]
    public ?bool $reenable_all_connections;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $reenable_all_connections = null): self
    {
        $obj = new self;

        null !== $reenable_all_connections && $obj['reenable_all_connections'] = $reenable_all_connections;

        return $obj;
    }

    /**
     * When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     */
    public function withReenableAllConnections(
        bool $reenableAllConnections
    ): self {
        $obj = clone $this;
        $obj['reenable_all_connections'] = $reenableAllConnections;

        return $obj;
    }
}
