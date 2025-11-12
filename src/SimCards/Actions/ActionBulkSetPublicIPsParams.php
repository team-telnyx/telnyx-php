<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API triggers an asynchronous operation to set a public IP for each of the specified SIM cards.<br/>
 * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api/wireless/list-sim-card-actions) API.
 *
 * @see Telnyx\Services\SimCards\ActionsService::bulkSetPublicIPs()
 *
 * @phpstan-type ActionBulkSetPublicIPsParamsShape = array{
 *   sim_card_ids: list<string>
 * }
 */
final class ActionBulkSetPublicIPsParams implements BaseModel
{
    /** @use SdkModel<ActionBulkSetPublicIPsParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var list<string> $sim_card_ids */
    #[Api(list: 'string')]
    public array $sim_card_ids;

    /**
     * `new ActionBulkSetPublicIPsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionBulkSetPublicIPsParams::with(sim_card_ids: ...)
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
     * @param list<string> $sim_card_ids
     */
    public static function with(array $sim_card_ids): self
    {
        $obj = new self;

        $obj->sim_card_ids = $sim_card_ids;

        return $obj;
    }

    /**
     * @param list<string> $simCardIDs
     */
    public function withSimCardIDs(array $simCardIDs): self
    {
        $obj = clone $this;
        $obj->sim_card_ids = $simCardIDs;

        return $obj;
    }
}
