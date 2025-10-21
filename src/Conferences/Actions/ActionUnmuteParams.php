<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Unmute a list of participants in a conference call.
 *
 * @see Telnyx\Conferences\Actions->unmute
 *
 * @phpstan-type action_unmute_params = array{callControlIDs?: list<string>}
 */
final class ActionUnmuteParams implements BaseModel
{
    /** @use SdkModel<action_unmute_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unmuted. When empty all participants will be unmuted.
     *
     * @var list<string>|null $callControlIDs
     */
    #[Api('call_control_ids', list: 'string', optional: true)]
    public ?array $callControlIDs;

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
    public static function with(?array $callControlIDs = null): self
    {
        $obj = new self;

        null !== $callControlIDs && $obj->callControlIDs = $callControlIDs;

        return $obj;
    }

    /**
     * List of unique identifiers and tokens for controlling the call. Enter each call control ID to be unmuted. When empty all participants will be unmuted.
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
