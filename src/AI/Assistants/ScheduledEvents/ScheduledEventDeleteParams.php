<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ScheduledEventDeleteParams); // set properties as needed
 * $client->ai.assistants.scheduledEvents->delete(...$params->toArray());
 * ```
 * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.scheduledEvents->delete(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\ScheduledEvents->delete
 *
 * @phpstan-type scheduled_event_delete_params = array{assistantID: string}
 */
final class ScheduledEventDeleteParams implements BaseModel
{
    /** @use SdkModel<scheduled_event_delete_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistantID;

    /**
     * `new ScheduledEventDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventDeleteParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledEventDeleteParams)->withAssistantID(...)
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
    public static function with(string $assistantID): self
    {
        $obj = new self;

        $obj->assistantID = $assistantID;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }
}
