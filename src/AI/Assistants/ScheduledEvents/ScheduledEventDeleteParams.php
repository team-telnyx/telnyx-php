<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
 *
 * @see Telnyx\AI\Assistants\ScheduledEvents->delete
 *
 * @phpstan-type ScheduledEventDeleteParamsShape = array{assistantID: string}
 */
final class ScheduledEventDeleteParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventDeleteParamsShape> */
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
