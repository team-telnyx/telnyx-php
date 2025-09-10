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
 * $params = (new ActionStopParams); // set properties as needed
 * $client->conferences.actions->stop(...$params->toArray());
 * ```
 * Stop audio being played to all or some participants on a conference call.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->conferences.actions->stop(...$params->toArray());`
 *
 * @see Telnyx\Conferences\Actions->stop
 *
 * @phpstan-type action_stop_params = array{callControlIDs?: list<string>}
 */
final class ActionStopParams implements BaseModel
{
    /** @use SdkModel<action_stop_params> */
    use SdkModel;
    use SdkParams;

    /**
     * List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
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
     * List of call control ids identifying participants the audio file should stop be played to. If not given, the audio will be stoped to the entire conference.
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
