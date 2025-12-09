<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallForkStartedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallForkStartedWebhookEvent\Data\Payload\StreamType;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   streamType?: value-of<StreamType>|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Unique ID for controlling the call.
     */
    #[Optional('call_control_id')]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional('call_leg_id')]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional('call_session_id')]
    public ?string $callSessionID;

    /**
     * State received from a command.
     */
    #[Optional('client_state')]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Type of media streamed. It can be either 'raw' or 'decrypted'.
     *
     * @var value-of<StreamType>|null $streamType
     */
    #[Optional('stream_type', enum: StreamType::class)]
    public ?string $streamType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        StreamType|string|null $streamType = null,
    ): self {
        $obj = new self;

        null !== $callControlID && $obj['callControlID'] = $callControlID;
        null !== $callLegID && $obj['callLegID'] = $callLegID;
        null !== $callSessionID && $obj['callSessionID'] = $callSessionID;
        null !== $clientState && $obj['clientState'] = $clientState;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $streamType && $obj['streamType'] = $streamType;

        return $obj;
    }

    /**
     * Unique ID for controlling the call.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['callControlID'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['callLegID'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['callSessionID'] = $callSessionID;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['clientState'] = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Type of media streamed. It can be either 'raw' or 'decrypted'.
     *
     * @param StreamType|value-of<StreamType> $streamType
     */
    public function withStreamType(StreamType|string $streamType): self
    {
        $obj = clone $this;
        $obj['streamType'] = $streamType;

        return $obj;
    }
}
