<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallDeepfakeDetectionResultWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallDeepfakeDetectionResultWebhookEvent\Data\Payload\Result;

/**
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   consistency?: float|null,
 *   result?: null|Result|value-of<Result>,
 *   score?: float|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
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
    #[Optional('client_state', nullable: true)]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Percentage (0-100) indicating how consistently the model classified the audio across frames. High consistency (>90%) means confident classification throughout; low consistency suggests mixed signals. Null for silence_timeout.
     */
    #[Optional(nullable: true)]
    public ?float $consistency;

    /**
     * Detection outcome. 'real' = human voice, 'fake' = AI-generated voice, 'silence_timeout' = no analyzable speech detected before timeout.
     *
     * @var value-of<Result>|null $result
     */
    #[Optional(enum: Result::class)]
    public ?string $result;

    /**
     * Probability that the audio is AI-generated, from 0.0 (likely real) to 1.0 (likely deepfake). Based on the model's aggregated confidence across analyzed audio frames. Null for silence_timeout.
     */
    #[Optional(nullable: true)]
    public ?float $score;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Result|value-of<Result>|null $result
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?float $consistency = null,
        Result|string|null $result = null,
        ?float $score = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $consistency && $self['consistency'] = $consistency;
        null !== $result && $self['result'] = $result;
        null !== $score && $self['score'] = $score;

        return $self;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $self = clone $this;
        $self['callControlID'] = $callControlID;

        return $self;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $self = clone $this;
        $self['callLegID'] = $callLegID;

        return $self;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $self = clone $this;
        $self['callSessionID'] = $callSessionID;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(?string $clientState): self
    {
        $self = clone $this;
        $self['clientState'] = $clientState;

        return $self;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Percentage (0-100) indicating how consistently the model classified the audio across frames. High consistency (>90%) means confident classification throughout; low consistency suggests mixed signals. Null for silence_timeout.
     */
    public function withConsistency(?float $consistency): self
    {
        $self = clone $this;
        $self['consistency'] = $consistency;

        return $self;
    }

    /**
     * Detection outcome. 'real' = human voice, 'fake' = AI-generated voice, 'silence_timeout' = no analyzable speech detected before timeout.
     *
     * @param Result|value-of<Result> $result
     */
    public function withResult(Result|string $result): self
    {
        $self = clone $this;
        $self['result'] = $result;

        return $self;
    }

    /**
     * Probability that the audio is AI-generated, from 0.0 (likely real) to 1.0 (likely deepfake). Based on the model's aggregated confidence across analyzed audio frames. Null for silence_timeout.
     */
    public function withScore(?float $score): self
    {
        $self = clone $this;
        $self['score'] = $score;

        return $self;
    }
}
