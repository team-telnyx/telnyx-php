<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\CallingPartyType;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data\Payload\Result1 as Result;

/**
 * @phpstan-type payload_alias = array{
 *   callControlID?: string|null,
 *   callLegID?: string|null,
 *   callSessionID?: string|null,
 *   callingPartyType?: value-of<CallingPartyType>|null,
 *   clientState?: string|null,
 *   connectionID?: string|null,
 *   insightGroupID?: string|null,
 *   results?: list<Result>|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<payload_alias> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Api('call_control_id', optional: true)]
    public ?string $callControlID;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Api('call_leg_id', optional: true)]
    public ?string $callLegID;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Api('call_session_id', optional: true)]
    public ?string $callSessionID;

    /**
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $callingPartyType
     */
    #[Api('calling_party_type', enum: CallingPartyType::class, optional: true)]
    public ?string $callingPartyType;

    /**
     * State received from a command.
     */
    #[Api('client_state', optional: true)]
    public ?string $clientState;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * ID that is unique to the insight group being generated for the call.
     */
    #[Api('insight_group_id', optional: true)]
    public ?string $insightGroupID;

    /**
     * Array of insight results being generated for the call.
     *
     * @var list<Result>|null $results
     */
    #[Api(list: Result::class, optional: true)]
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
     * @param list<Result> $results
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
        $obj = new self;

        null !== $callControlID && $obj->callControlID = $callControlID;
        null !== $callLegID && $obj->callLegID = $callLegID;
        null !== $callSessionID && $obj->callSessionID = $callSessionID;
        null !== $callingPartyType && $obj->callingPartyType = $callingPartyType instanceof CallingPartyType ? $callingPartyType->value : $callingPartyType;
        null !== $clientState && $obj->clientState = $clientState;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $insightGroupID && $obj->insightGroupID = $insightGroupID;
        null !== $results && $obj->results = $results;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj->callControlID = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj->callLegID = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj->callSessionID = $callSessionID;

        return $obj;
    }

    /**
     * The type of calling party connection.
     *
     * @param CallingPartyType|value-of<CallingPartyType> $callingPartyType
     */
    public function withCallingPartyType(
        CallingPartyType|string $callingPartyType
    ): self {
        $obj = clone $this;
        $obj->callingPartyType = $callingPartyType instanceof CallingPartyType ? $callingPartyType->value : $callingPartyType;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj->clientState = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * ID that is unique to the insight group being generated for the call.
     */
    public function withInsightGroupID(string $insightGroupID): self
    {
        $obj = clone $this;
        $obj->insightGroupID = $insightGroupID;

        return $obj;
    }

    /**
     * Array of insight results being generated for the call.
     *
     * @param list<Result> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj->results = $results;

        return $obj;
    }
}
