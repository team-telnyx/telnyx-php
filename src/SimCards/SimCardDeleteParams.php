<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new SimCardDeleteParams); // set properties as needed
 * $client->simCards->delete(...$params->toArray());
 * ```
 * The SIM card will be decommissioned, removed from your account and you will stop being charged.<br />The SIM card won't be able to connect to the network after the deletion is completed, thus making it impossible to consume data.<br/>
 * Transitioning to the disabled state may take a period of time.
 * Until the transition is completed, the SIM card status will be disabling <code>disabling</code>.<br />In order to re-enable the SIM card, you will need to re-register it.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCards->delete(...$params->toArray());`
 *
 * @see Telnyx\SimCards->delete
 *
 * @phpstan-type sim_card_delete_params = array{reportLost?: bool}
 */
final class SimCardDeleteParams implements BaseModel
{
    /** @use SdkModel<sim_card_delete_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     */
    #[Api(optional: true)]
    public ?bool $reportLost;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $reportLost = null): self
    {
        $obj = new self;

        null !== $reportLost && $obj->reportLost = $reportLost;

        return $obj;
    }

    /**
     * Enables deletion of disabled eSIMs that can't be uninstalled from a device. This is irreversible and the eSIM cannot be re-registered.
     */
    public function withReportLost(bool $reportLost): self
    {
        $obj = clone $this;
        $obj->reportLost = $reportLost;

        return $obj;
    }
}
