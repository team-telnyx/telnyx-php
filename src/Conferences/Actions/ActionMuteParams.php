<?php

declare(strict_types=1);

namespace Telnyx\Conferences\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ActionMuteParams); // set properties as needed
 * $client->conferences.actions->mute(...$params->toArray());
 * ```
 * Mute a list of participants in a conference call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conferences.actions->mute(...$params->toArray());`
 *
 * @see Telnyx\Conferences\Actions->mute
 *
 * @phpstan-type action_mute_params = array{callControlIDs?: list<string>}
 */
final class ActionMuteParams implements BaseModel
{
    /** @use SdkModel<action_mute_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
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
     * Array of unique identifiers and tokens for controlling the call. When empty all participants will be muted.
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
