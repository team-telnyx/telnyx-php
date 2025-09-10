<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionEnableParams); // set properties as needed
 * $client->managedAccounts.actions->enable(...$params->toArray());
 * ```
 * Enables a managed account and its sub-users to use Telnyx services.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->managedAccounts.actions->enable(...$params->toArray());`
 *
 * @see Telnyx\ManagedAccounts\Actions->enable
 *
 * @phpstan-type action_enable_params = array{reenableAllConnections?: bool}
 */
final class ActionEnableParams implements BaseModel
{
    /** @use SdkModel<action_enable_params> */
    use SdkModel;
    use SdkParams;

    /**
     * When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     */
    #[Api('reenable_all_connections', optional: true)]
    public ?bool $reenableAllConnections;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $reenableAllConnections = null): self
    {
        $obj = new self;

        null !== $reenableAllConnections && $obj->reenableAllConnections = $reenableAllConnections;

        return $obj;
    }

    /**
     * When true, all connections owned by this managed account will automatically be re-enabled. Note: Any connections that do not pass validations will not be re-enabled.
     */
    public function withReenableAllConnections(
        bool $reenableAllConnections
    ): self {
        $obj = clone $this;
        $obj->reenableAllConnections = $reenableAllConnections;

        return $obj;
    }
}
