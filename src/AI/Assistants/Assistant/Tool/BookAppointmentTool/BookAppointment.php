<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool\BookAppointmentTool;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BookAppointmentShape = array{
 *   apiKeyRef: string,
 *   eventTypeID: int,
 *   attendeeName?: string,
 *   attendeeTimezone?: string,
 * }
 */
final class BookAppointment implements BaseModel
{
    /** @use SdkModel<BookAppointmentShape> */
    use SdkModel;

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    #[Api('api_key_ref')]
    public string $apiKeyRef;

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-event-type-id).
     */
    #[Api('event_type_id')]
    public int $eventTypeID;

    /**
     * The name of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-name). If not provided, the assistant will ask for the attendee's name.
     */
    #[Api('attendee_name', optional: true)]
    public ?string $attendeeName;

    /**
     * The timezone of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-timezone). If not provided, the assistant will ask for the attendee's timezone.
     */
    #[Api('attendee_timezone', optional: true)]
    public ?string $attendeeTimezone;

    /**
     * `new BookAppointment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointment::with(apiKeyRef: ..., eventTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new BookAppointment)->withAPIKeyRef(...)->withEventTypeID(...)
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
    public static function with(
        string $apiKeyRef,
        int $eventTypeID,
        ?string $attendeeName = null,
        ?string $attendeeTimezone = null,
    ): self {
        $obj = new self;

        $obj->apiKeyRef = $apiKeyRef;
        $obj->eventTypeID = $eventTypeID;

        null !== $attendeeName && $obj->attendeeName = $attendeeName;
        null !== $attendeeTimezone && $obj->attendeeTimezone = $attendeeTimezone;

        return $obj;
    }

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->apiKeyRef = $apiKeyRef;

        return $obj;
    }

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-event-type-id).
     */
    public function withEventTypeID(int $eventTypeID): self
    {
        $obj = clone $this;
        $obj->eventTypeID = $eventTypeID;

        return $obj;
    }

    /**
     * The name of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-name). If not provided, the assistant will ask for the attendee's name.
     */
    public function withAttendeeName(string $attendeeName): self
    {
        $obj = clone $this;
        $obj->attendeeName = $attendeeName;

        return $obj;
    }

    /**
     * The timezone of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-timezone). If not provided, the assistant will ask for the attendee's timezone.
     */
    public function withAttendeeTimezone(string $attendeeTimezone): self
    {
        $obj = clone $this;
        $obj->attendeeTimezone = $attendeeTimezone;

        return $obj;
    }
}
