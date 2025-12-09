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
 * @phpstan-type ScheduledEventDeleteParamsShape = array{assistantID: string}
 */
final class ScheduledEventDeleteParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
        $self = new self;

        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }
}
