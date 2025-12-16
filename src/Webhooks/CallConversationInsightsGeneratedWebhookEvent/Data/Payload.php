<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\CallingPartyType;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\Result1 as Result;

/**
 * @phpstan-import-type Result1Shape from \Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\Result1
 *
 * @phpstan-type PayloadShape = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   callingPartyType?: null|CallingPartyType|value-of<CallingPartyType>,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   insightGroupID?: string|null,
 *   results?: list<Result1Shape>|null,
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
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $callingPartyType
     */
    #[Optional('calling_party_type', enum: CallingPartyType::class)]
    public ?string $callingPartyType;

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
     * ID that is unique to the insight group being generated for the call.
     */
    #[Optional('insight_group_id')]
    public ?string $insightGroupID;

    /**
     * Array of insight results being generated for the call.
     *
     * @var list<Result>|null $results
     */
    #[Optional(list: Result::class)]
    public ?array $results;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     * @param list<Result1Shape> $results
     */
    public static function with(
        ?string $callControlID = null,
        ?string $callLegID = null,
        ?string $callSessionID = null,
        CallingPartyType|string|null $callingPartyType = null,
        ?string $clientState = null,
        ?string $connectionID = null,
        ?string $insightGroupID = null,
        ?array $results = null,
    ): self {
        $self = new self;

        null !== $callControlID && $self['callControlID'] = $callControlID;
        null !== $callLegID && $self['callLegID'] = $callLegID;
        null !== $callSessionID && $self['callSessionID'] = $callSessionID;
        null !== $callingPartyType && $self['callingPartyType'] = $callingPartyType;
        null !== $clientState && $self['clientState'] = $clientState;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $insightGroupID && $self['insightGroupID'] = $insightGroupID;
        null !== $results && $self['results'] = $results;

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
     * The type of calling party connection.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     */
    public function withCallingPartyType(
        CallingPartyType|string $callingPartyType
    ): self {
        $self = clone $this;
        $self['callingPartyType'] = $callingPartyType;

        return $self;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
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
     * ID that is unique to the insight group being generated for the call.
     */
    public function withInsightGroupID(string $insightGroupID): self
    {
        $self = clone $this;
        $self['insightGroupID'] = $insightGroupID;

        return $self;
    }

    /**
     * Array of insight results being generated for the call.
     *
     * @param list<Result1Shape> $results
     */
    public function withResults(array $results): self
    {
        $self = clone $this;
        $self['results'] = $results;

        return $self;
    }
}
