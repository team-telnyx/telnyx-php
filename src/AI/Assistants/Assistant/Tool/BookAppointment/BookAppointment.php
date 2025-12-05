<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool\BookAppointment;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BookAppointmentShape = array{
 *   api_key_ref: string,
 *   event_type_id: int,
 *   attendee_name?: string|null,
 *   attendee_timezone?: string|null,
 * }
 */
final class BookAppointment implements BaseModel
{
    /** @use SdkModel<BookAppointmentShape> */
    use SdkModel;

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    #[Api]
    public string $api_key_ref;

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-event-type-id).
     */
    #[Api]
    public int $event_type_id;

    /**
     * The name of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-name). If not provided, the assistant will ask for the attendee's name.
     */
    #[Api(optional: true)]
    public ?string $attendee_name;

    /**
     * The timezone of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-timezone). If not provided, the assistant will ask for the attendee's timezone.
     */
    #[Api(optional: true)]
    public ?string $attendee_timezone;

    /**
     * `new BookAppointment()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * BookAppointment::with(api_key_ref: ..., event_type_id: ...)
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
        string $api_key_ref,
        int $event_type_id,
        ?string $attendee_name = null,
        ?string $attendee_timezone = null,
    ): self {
        $obj = new self;

        $obj['api_key_ref'] = $api_key_ref;
        $obj['event_type_id'] = $event_type_id;

        null !== $attendee_name && $obj['attendee_name'] = $attendee_name;
        null !== $attendee_timezone && $obj['attendee_timezone'] = $attendee_timezone;

        return $obj;
    }

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj['api_key_ref'] = $apiKeyRef;

        return $obj;
    }

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-event-type-id).
     */
    public function withEventTypeID(int $eventTypeID): self
    {
        $obj = clone $this;
        $obj['event_type_id'] = $eventTypeID;

        return $obj;
    }

    /**
     * The name of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-name). If not provided, the assistant will ask for the attendee's name.
     */
    public function withAttendeeName(string $attendeeName): self
    {
        $obj = clone $this;
        $obj['attendee_name'] = $attendeeName;

        return $obj;
    }

    /**
     * The timezone of the attendee [cal.com](https://cal.com/docs/api-reference/v2/bookings/create-a-booking#body-attendee-timezone). If not provided, the assistant will ask for the attendee's timezone.
     */
    public function withAttendeeTimezone(string $attendeeTimezone): self
    {
        $obj = clone $this;
        $obj['attendee_timezone'] = $attendeeTimezone;

        return $obj;
    }
}
