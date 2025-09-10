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
 * $params = (new ActionBulkSetPublicIPsParams); // set properties as needed
 * $client->simCards.actions->bulkSetPublicIPs(...$params->toArray());
 * ```
 * This API triggers an asynchronous operation to set a public IP for each of the specified SIM cards.<br/>
 * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developersdev.telnyx.com/docs/api/v2/wireless/SIM-Card-Actions#ListSIMCardActions) API.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->simCards.actions->bulkSetPublicIPs(...$params->toArray());`
 *
 * @see Telnyx\SimCards\Actions->bulkSetPublicIPs
 *
 * @phpstan-type action_bulk_set_public_ips_params = array{
 *   simCardIDs: list<string>
 * }
 */
final class ActionBulkSetPublicIPsParams implements BaseModel
{
    /** @use SdkModel<action_bulk_set_public_ips_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $simCardIDs */
    #[Api('sim_card_ids', list: 'string')]
    public array $simCardIDs;

    /**
     * `new ActionBulkSetPublicIPsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionBulkSetPublicIPsParams::with(simCardIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionBulkSetPublicIPsParams)->withSimCardIDs(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $simCardIDs
     */
    public static function with(array $simCardIDs): self
    {
        $obj = new self;

        $obj->simCardIDs = $simCardIDs;

        return $obj;
    }

    /**
     * @param list<string> $simCardIDs
     */
    public function withSimCardIDs(array $simCardIDs): self
    {
        $obj = clone $this;
        $obj->simCardIDs = $simCardIDs;

        return $obj;
    }
}
