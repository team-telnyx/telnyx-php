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
 * @phpstan-type ScheduledEventRetrieveParamsShape = array{assistant_id: string}
 */
final class ScheduledEventRetrieveParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $assistant_id;

    /**
     * `new ScheduledEventRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventRetrieveParams::with(assistant_id: ...)
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
