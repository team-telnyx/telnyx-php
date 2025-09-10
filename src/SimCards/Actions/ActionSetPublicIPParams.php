<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionSetPublicIPParams); // set properties as needed
 * $client->simCards.actions->setPublicIP(...$params->toArray());
 * ```
 * This API makes a SIM card reachable on the public internet by mapping a random public IP to the SIM card. <br/><br/>
 *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API. <br/><br/>
 *  Setting a Public IP to a SIM Card incurs a charge and will only succeed if the account has sufficient funds.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCards.actions->setPublicIP(...$params->toArray());`
 *
 * @see Telnyx\SimCards\Actions->setPublicIP
 *
 * @phpstan-type action_set_public_ip_params = array{regionCode?: string}
 */
final class ActionSetPublicIPParams implements BaseModel
{
    /** @use SdkModel<action_set_public_ip_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint.
     */
    #[Api(optional: true)]
    public ?string $regionCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $regionCode = null): self
    {
        $obj = new self;

        null !== $regionCode && $obj->regionCode = $regionCode;

        return $obj;
    }

    /**
     * The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint.
     */
    public function withRegionCode(string $regionCode): self
    {
        $obj = clone $this;
        $obj->regionCode = $regionCode;

        return $obj;
    }
}
