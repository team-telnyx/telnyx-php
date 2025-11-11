<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallPlaybackEndedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallPlaybackEndedWebhookEvent\Data\Payload\Status;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   media_name?: string|null,
 *   media_url?: string|null,
 *   overlay?: bool|null,
 *   status?: value-of<Status>|null,
 *   status_detail?: string|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api(optional: true)]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api(optional: true)]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api(optional: true)]
    public ?string $call_session_id;

    /**
     * State received from a command.
     */
    #[Api(optional: true)]
    public ?string $client_state;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api(optional: true)]
    public ?string $connection_id;

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    #[Api(optional: true)]
    public ?string $media_name;

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    #[Api(optional: true)]
    public ?string $media_url;

    /**
     * Whether the stopped audio was in overlay mode or not.
     */
    #[Api(optional: true)]
    public ?bool $overlay;

    /**
     * Reflects how command ended.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Provides details in case of failure.
     */
    #[Api(optional: true)]
    public ?string $status_detail;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?string $media_name = null,
        ?string $media_url = null,
        ?bool $overlay = null,
        Status|string|null $status = null,
        ?string $status_detail = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj->call_control_id = $call_control_id;
        null !== $call_leg_id && $obj->call_leg_id = $call_leg_id;
        null !== $call_session_id && $obj->call_session_id = $call_session_id;
        null !== $client_state && $obj->client_state = $client_state;
        null !== $connection_id && $obj->connection_id = $connection_id;
        null !== $media_name && $obj->media_name = $media_name;
        null !== $media_url && $obj->media_url = $media_url;
        null !== $overlay && $obj->overlay = $overlay;
        null !== $status && $obj['status'] = $status;
        null !== $status_detail && $obj->status_detail = $status_detail;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->call_control_id = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->call_leg_id = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->call_session_id = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->client_state = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connection_id = $connectionID;

        return $obj;
    }

    /**
     * The name of the audio media file being played back, if media_name has been used to start.
     */
    public function withMediaName(string $mediaName): self
    {
        $obj = clone $this;
        $obj->media_name = $mediaName;

        return $obj;
    }

    /**
     * The audio URL being played back, if audio_url has been used to start.
     */
    public function withMediaURL(string $mediaURL): self
    {
        $obj = clone $this;
        $obj->media_url = $mediaURL;

        return $obj;
    }

    /**
     * Whether the stopped audio was in overlay mode or not.
     */
    public function withOverlay(bool $overlay): self
    {
        $obj = clone $this;
        $obj->overlay = $overlay;

        return $obj;
    }

    /**
     * Reflects how command ended.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Provides details in case of failure.
     */
    public function withStatusDetail(string $statusDetail): self
    {
        $obj = clone $this;
        $obj->status_detail = $statusDetail;

        return $obj;
    }
}
