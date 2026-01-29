<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a scheduled event by event ID.
 *
 * @see Telnyx\Services\AI\Assistants\ScheduledEventsService::retrieve()
 *
 * @phpstan-type ScheduledEventRetrieveParamsShape = array{assistantID: string}
 */
final class ScheduledEventRetrieveParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
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
