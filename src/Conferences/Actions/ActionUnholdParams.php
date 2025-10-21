<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Unhold a list of participants in a conference call.
 *
 * @see Telnyx\Conferences\Actions->unhold
 *
 * @phpstan-type action_unhold_params = array{callControlIDs: list<string>}
 */
final class ActionUnholdParams implements BaseModel
{
    /** @use SdkModel<action_unhold_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
     *
     * @var list<string> $callControlIDs
     */
    #[Api('call_control_ids', list: 'string')]
    public array $callControlIDs;

    /**
     * `new ActionUnholdParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActionUnholdParams::with(callControlIDs: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActionUnholdParams)->withCallControlIDs(...)
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
     * @param list<string> $callControlIDs
     */
    public static function with(array $callControlIDs): self
    {
        $obj = new self;

        $obj->callControlIDs = $callControlIDs;

        return $obj;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unheld.
     *
     * @param list<string> $callControlIDs
     */
    public function withCallControlIDs(array $callControlIDs): self
    {
        $obj = clone $this;
        $obj->callControlIDs = $callControlIDs;

        return $obj;
    }
}
