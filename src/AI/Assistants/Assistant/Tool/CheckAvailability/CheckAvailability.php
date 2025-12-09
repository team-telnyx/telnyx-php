<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Assistant\Tool\CheckAvailability;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CheckAvailabilityShape = array{
 *   apiKeyRef: string, eventTypeID: int
 * }
 */
final class CheckAvailability implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityShape> */
    use SdkModel;

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    #[Required('api_key_ref')]
    public string $apiKeyRef;

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/slots/get-available-slots#parameter-event-type-id).
     */
    #[Required('event_type_id')]
    public int $eventTypeID;

    /**
     * `new CheckAvailability()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailability::with(apiKeyRef: ..., eventTypeID: ...)
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
    public static function with(string $apiKeyRef, int $eventTypeID): self
    {
        $obj = new self;

        $obj['apiKeyRef'] = $apiKeyRef;
        $obj['eventTypeID'] = $eventTypeID;

        return $obj;
    }

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $obj = clone $this;
        $obj['apiKeyRef'] = $apiKeyRef;

        return $obj;
    }

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/slots/get-available-slots#parameter-event-type-id).
     */
    public function withEventTypeID(int $eventTypeID): self
    {
        $obj = clone $this;
        $obj['eventTypeID'] = $eventTypeID;

        return $obj;
    }
}
