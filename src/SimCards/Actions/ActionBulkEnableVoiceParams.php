<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API triggers an asynchronous operation to enable voice on SIM cards belonging to a specified SIM Card Group.<br/>
 * For each SIM Card a SIM Card Action will be generated. The status of the SIM Card Actions can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API.
 *
 * The overall status of the Bulk SIM Card Action can be followed through the [List Bulk SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-bulk-sim-card-actions) API.
 *
 * @see Telnyx\Services\SimCards\ActionsService::bulkEnableVoice()
 *
 * @phpstan-type ActionBulkEnableVoiceParamsShape = array{simCardGroupID: string}
 */
final class ActionBulkEnableVoiceParams implements BaseModel
{
    /** @use SdkModel<ActionBulkEnableVoiceParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required('sim_card_group_id')]
    public string $simCardGroupID;

    /**
     * `new ActionBulkEnableVoiceParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionBulkEnableVoiceParams::with(simCardGroupID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionBulkEnableVoiceParams)->withSimCardGroupID(...)
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
    public static function with(string $simCardGroupID): self
    {
        $self = new self;

        $self['simCardGroupID'] = $simCardGroupID;

        return $self;
    }

    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $self = clone $this;
        $self['simCardGroupID'] = $simCardGroupID;

        return $self;
    }
}
