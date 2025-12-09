<?php

declare(strict_types=1);

namespace Telnyx\Rooms;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Synchronously create a Room.
 *
 * @see Telnyx\Services\RoomsService::create()
 *
 * @phpstan-type RoomCreateParamsShape = array{
 *   enableRecording?: bool,
 *   maxParticipants?: int,
 *   uniqueName?: string,
 *   webhookEventFailoverURL?: string|null,
 *   webhookEventURL?: string,
 *   webhookTimeoutSecs?: int|null,
 * }
 */
final class RoomCreateParams implements BaseModel
{
    /** @use SdkModel<RoomCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Enable or disable recording for that room.
     */
    #[Optional('enable_recording')]
    public ?bool $enableRecording;

    /**
     * The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     */
    #[Optional('max_participants')]
    public ?int $maxParticipants;

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    #[Optional('unique_name')]
    public ?string $uniqueName;

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_failover_url', nullable: true)]
    public ?string $webhookEventFailoverURL;

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    #[Optional('webhook_event_url')]
    public ?string $webhookEventURL;

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    #[Optional('webhook_timeout_secs', nullable: true)]
    public ?int $webhookTimeoutSecs;

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
        ?bool $enableRecording = null,
        ?int $maxParticipants = null,
        ?string $uniqueName = null,
        ?string $webhookEventFailoverURL = null,
        ?string $webhookEventURL = null,
        ?int $webhookTimeoutSecs = null,
    ): self {
        $obj = new self;

        null !== $enableRecording && $obj['enableRecording'] = $enableRecording;
        null !== $maxParticipants && $obj['maxParticipants'] = $maxParticipants;
        null !== $uniqueName && $obj['uniqueName'] = $uniqueName;
        null !== $webhookEventFailoverURL && $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;
        null !== $webhookEventURL && $obj['webhookEventURL'] = $webhookEventURL;
        null !== $webhookTimeoutSecs && $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }

    /**
     * Enable or disable recording for that room.
     */
    public function withEnableRecording(bool $enableRecording): self
    {
        $obj = clone $this;
        $obj['enableRecording'] = $enableRecording;

        return $obj;
    }

    /**
     * The maximum amount of participants allowed in a room. If new participants try to join after that limit is reached, their request will be rejected.
     */
    public function withMaxParticipants(int $maxParticipants): self
    {
        $obj = clone $this;
        $obj['maxParticipants'] = $maxParticipants;

        return $obj;
    }

    /**
     * The unique (within the Telnyx account scope) name of the room.
     */
    public function withUniqueName(string $uniqueName): self
    {
        $obj = clone $this;
        $obj['uniqueName'] = $uniqueName;

        return $obj;
    }

    /**
     * The failover URL where webhooks related to this room will be sent if sending to the primary URL fails. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventFailoverURL(
        ?string $webhookEventFailoverURL
    ): self {
        $obj = clone $this;
        $obj['webhookEventFailoverURL'] = $webhookEventFailoverURL;

        return $obj;
    }

    /**
     * The URL where webhooks related to this room will be sent. Must include a scheme, such as 'https'.
     */
    public function withWebhookEventURL(string $webhookEventURL): self
    {
        $obj = clone $this;
        $obj['webhookEventURL'] = $webhookEventURL;

        return $obj;
    }

    /**
     * Specifies how many seconds to wait before timing out a webhook.
     */
    public function withWebhookTimeoutSecs(?int $webhookTimeoutSecs): self
    {
        $obj = clone $this;
        $obj['webhookTimeoutSecs'] = $webhookTimeoutSecs;

        return $obj;
    }
}
