<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool\CheckAvailabilityTool;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CheckAvailabilityShape = array{
 *   api_key_ref: string, event_type_id: int
 * }
 */
final class CheckAvailability implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityShape> */
    use SdkModel;

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    #[Api]
    public string $api_key_ref;

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/slots/get-available-slots#parameter-event-type-id).
     */
    #[Api]
    public int $event_type_id;

    /**
     * `new CheckAvailability()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailability::with(api_key_ref: ..., event_type_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckAvailability)->withAPIKeyRef(...)->withEventTypeID(...)
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
    public static function with(string $api_key_ref, int $event_type_id): self
    {
        $obj = new self;

        $obj->api_key_ref = $api_key_ref;
        $obj->event_type_id = $event_type_id;

        return $obj;
    }

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj->api_key_ref = $apiKeyRef;

        return $obj;
    }

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/slots/get-available-slots#parameter-event-type-id).
     */
    public function withEventTypeID(int $eventTypeID): self
    {
        $obj = clone $this;
        $obj->event_type_id = $eventTypeID;

        return $obj;
    }
}
