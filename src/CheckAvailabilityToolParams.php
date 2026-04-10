<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CheckAvailabilityToolParamsShape = array{
 *   apiKeyRef: string, eventTypeID: int
 * }
 */
final class CheckAvailabilityToolParams implements BaseModel
{
    /** @use SdkModel<CheckAvailabilityToolParamsShape> */
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
     * `new CheckAvailabilityToolParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CheckAvailabilityToolParams::with(apiKeyRef: ..., eventTypeID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CheckAvailabilityToolParams)->withAPIKeyRef(...)->withEventTypeID(...)
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
        $self = new self;

        $self['apiKeyRef'] = $apiKeyRef;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }

    /**
     * Reference to an integration secret that contains your Cal.com API key. You would pass the `identifier` for an integration secret [/v2/integration_secrets](https://developers.telnyx.com/api/secrets-manager/integration-secrets/create-integration-secret) that refers to your Cal.com API key.
     */
    public function withAPIKeyRef(string $apiKeyRef): self
    {
        $self = clone $this;
        $self['apiKeyRef'] = $apiKeyRef;

        return $self;
    }

    /**
     * Event Type ID for which slots are being fetched. [cal.com](https://cal.com/docs/api-reference/v2/slots/get-available-slots#parameter-event-type-id).
     */
    public function withEventTypeID(int $eventTypeID): self
    {
        $self = clone $this;
        $self['eventTypeID'] = $eventTypeID;

        return $self;
    }
}
