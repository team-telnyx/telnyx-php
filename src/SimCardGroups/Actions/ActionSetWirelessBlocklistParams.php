<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This action will asynchronously assign a Wireless Blocklist to all the SIMs in the SIM card group.
 *
 * @see Telnyx\Services\SimCardGroups\ActionsService::setWirelessBlocklist()
 *
 * @phpstan-type ActionSetWirelessBlocklistParamsShape = array{
 *   wireless_blocklist_id: string
 * }
 */
final class ActionSetWirelessBlocklistParams implements BaseModel
{
    /** @use SdkModel<ActionSetWirelessBlocklistParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    #[Api]
    public string $wireless_blocklist_id;

    /**
     * `new ActionSetWirelessBlocklistParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionSetWirelessBlocklistParams::with(wireless_blocklist_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionSetWirelessBlocklistParams)->withWirelessBlocklistID(...)
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
     */
    public static function with(string $wireless_blocklist_id): self
    {
        $obj = new self;

        $obj->wireless_blocklist_id = $wireless_blocklist_id;

        return $obj;
    }

    /**
     * The identification of the related Wireless Blocklist resource.
     */
    public function withWirelessBlocklistID(string $wirelessBlocklistID): self
    {
        $obj = clone $this;
        $obj->wireless_blocklist_id = $wirelessBlocklistID;

        return $obj;
    }
}
