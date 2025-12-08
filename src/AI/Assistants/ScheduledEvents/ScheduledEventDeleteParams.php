<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
 *
 * @see Telnyx\Services\AI\Assistants\ScheduledEventsService::delete()
 *
 * @phpstan-type ScheduledEventDeleteParamsShape = array{assistant_id: string}
 */
final class ScheduledEventDeleteParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $assistant_id;

    /**
     * `new ScheduledEventDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventDeleteParams::with(assistant_id: ...)
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
    public static function with(string $assistant_id): self
    {
        $obj = new self;

        $obj['assistant_id'] = $assistant_id;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistant_id'] = $assistantID;

        return $obj;
    }
}
