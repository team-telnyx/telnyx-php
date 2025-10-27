<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a scheduled event by event ID.
 *
 * @see Telnyx\AI\Assistants\ScheduledEvents->retrieve
 *
 * @phpstan-type scheduled_event_retrieve_params = array{assistantID: string}
 */
final class ScheduledEventRetrieveParams implements BaseModel
{
    /** @use SdkModel<scheduled_event_retrieve_params> */
    use SdkModel;
    use SdkParams;

    #[Api]
    public string $assistantID;

    /**
     * `new ScheduledEventRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventRetrieveParams::with(assistantID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledEventRetrieveParams)->withAssistantID(...)
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
