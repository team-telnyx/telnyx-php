<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MeetingSessions\MeetingSessionCreateParams\Assistant\AudioGate;

/**
 * Request options for attaching a voice assistant to the session. Routing fields (`call_control_connection_id`, `from`, and `loopback_sip_uri`) are used only to establish the assistant call leg and are omitted from response objects. `audio_gate` is returned with `id` in the assistant response object.
 *
 * @phpstan-type AssistantShape = array{
 *   id: string,
 *   callControlConnectionID: string,
 *   from: string,
 *   loopbackSipUri: string,
 *   audioGate?: null|AudioGate|value-of<AudioGate>,
 * }
 */
final class Assistant implements BaseModel
{
    /** @use SdkModel<AssistantShape> */
    use SdkModel;

    /**
     * Identifier of the assistant to attach.
     */
    #[Required]
    public string $id;

    /**
     * Call control connection used to bridge the assistant into the meeting audio.
     */
    #[Required('call_control_connection_id')]
    public string $callControlConnectionID;

    /**
     * E.164 calling number used as the originating party for the assistant call leg.
     */
    #[Required]
    public string $from;

    /**
     * SIP URI to which the assistant media loopback is established.
     */
    #[Required('loopback_sip_uri')]
    public string $loopbackSipUri;

    /**
     * Audio gating strategy for the assistant call leg.
     *
     * @var value-of<AudioGate>|null $audioGate
     */
    #[Optional('audio_gate', enum: AudioGate::class)]
    public ?string $audioGate;

    /**
     * `new Assistant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Assistant::with(
     *   id: ..., callControlConnectionID: ..., from: ..., loopbackSipUri: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Assistant)
     *   ->withID(...)
     *   ->withCallControlConnectionID(...)
     *   ->withFrom(...)
     *   ->withLoopbackSipUri(...)
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
     *
     * @param AudioGate|value-of<AudioGate>|null $audioGate
     */
    public static function with(
        string $id,
        string $callControlConnectionID,
        string $from,
        string $loopbackSipUri,
        AudioGate|string|null $audioGate = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['callControlConnectionID'] = $callControlConnectionID;
        $self['from'] = $from;
        $self['loopbackSipUri'] = $loopbackSipUri;

        null !== $audioGate && $self['audioGate'] = $audioGate;

        return $self;
    }

    /**
     * Identifier of the assistant to attach.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Call control connection used to bridge the assistant into the meeting audio.
     */
    public function withCallControlConnectionID(
        string $callControlConnectionID
    ): self {
        $self = clone $this;
        $self['callControlConnectionID'] = $callControlConnectionID;

        return $self;
    }

    /**
     * E.164 calling number used as the originating party for the assistant call leg.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * SIP URI to which the assistant media loopback is established.
     */
    public function withLoopbackSipUri(string $loopbackSipUri): self
    {
        $self = clone $this;
        $self['loopbackSipUri'] = $loopbackSipUri;

        return $self;
    }

    /**
     * Audio gating strategy for the assistant call leg.
     *
     * @param AudioGate|value-of<AudioGate> $audioGate
     */
    public function withAudioGate(AudioGate|string $audioGate): self
    {
        $self = clone $this;
        $self['audioGate'] = $audioGate;

        return $self;
    }
}
