<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data1;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data1\Payload\CallingPartyType;
use Telnyx\Webhooks\CallConversationInsightsGeneratedWebhookEvent\Data1\Payload\Result1 as Result;

/**
 * @phpstan-type PayloadShape = array{
 *   call_control_id?: string|null,
 *   call_leg_id?: string|null,
 *   call_session_id?: string|null,
 *   calling_party_type?: value-of<CallingPartyType>|null,
 *   client_state?: string|null,
 *   connection_id?: string|null,
 *   insight_group_id?: string|null,
 *   results?: list<Result>|null,
 * }
 */
final class Payload implements BaseModel
{
    /** @use SdkModel<PayloadShape> */
    use SdkModel;

    /**
     * Call ID used to issue commands via Call Control API.
     */
    #[Optional]
    public ?string $call_control_id;

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    #[Optional]
    public ?string $call_leg_id;

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    #[Optional]
    public ?string $call_session_id;

    /**
     * The type of calling party connection.
     *
     * @var value-of<CallingPartyType>|null $calling_party_type
     */
    #[Optional(enum: CallingPartyType::class)]
    public ?string $calling_party_type;

    /**
     * State received from a command.
     */
    #[Optional]
    public ?string $client_state;

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * ID that is unique to the insight group being generated for the call.
     */
    #[Optional]
    public ?string $insight_group_id;

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
     * @param CallingPartyType|value-of<CallingPartyType> $calling_party_type
     * @param list<Result|array{
     *   insight_id?: string|null, result?: mixed|string|null
     * }> $results
     */
    public static function with(
        ?string $call_control_id = null,
        ?string $call_leg_id = null,
        ?string $call_session_id = null,
        CallingPartyType|string|null $calling_party_type = null,
        ?string $client_state = null,
        ?string $connection_id = null,
        ?string $insight_group_id = null,
        ?array $results = null,
    ): self {
        $obj = new self;

        null !== $call_control_id && $obj['call_control_id'] = $call_control_id;
        null !== $call_leg_id && $obj['call_leg_id'] = $call_leg_id;
        null !== $call_session_id && $obj['call_session_id'] = $call_session_id;
        null !== $calling_party_type && $obj['calling_party_type'] = $calling_party_type;
        null !== $client_state && $obj['client_state'] = $client_state;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $insight_group_id && $obj['insight_group_id'] = $insight_group_id;
        null !== $results && $obj['results'] = $results;

        return $obj;
    }

    /**
     * Call ID used to issue commands via Call Control API.
     */
    public function withCallControlID(string $callControlID): self
    {
        $obj = clone $this;
        $obj['call_control_id'] = $callControlID;

        return $obj;
    }

    /**
     * ID that is unique to the call and can be used to correlate webhook events.
     */
    public function withCallLegID(string $callLegID): self
    {
        $obj = clone $this;
        $obj['call_leg_id'] = $callLegID;

        return $obj;
    }

    /**
     * ID that is unique to the call session and can be used to correlate webhook events. Call session is a group of related call legs that logically belong to the same phone call, e.g. an inbound and outbound leg of a transferred call.
     */
    public function withCallSessionID(string $callSessionID): self
    {
        $obj = clone $this;
        $obj['call_session_id'] = $callSessionID;

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
        $obj['calling_party_type'] = $callingPartyType;

        return $obj;
    }

    /**
     * State received from a command.
     */
    public function withClientState(string $clientState): self
    {
        $obj = clone $this;
        $obj['client_state'] = $clientState;

        return $obj;
    }

    /**
     * Call Control App ID (formerly Telnyx connection ID) used in the call.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * ID that is unique to the insight group being generated for the call.
     */
    public function withInsightGroupID(string $insightGroupID): self
    {
        $obj = clone $this;
        $obj['insight_group_id'] = $insightGroupID;

        return $obj;
    }

    /**
     * Array of insight results being generated for the call.
     *
     * @param list<Result|array{
     *   insight_id?: string|null, result?: mixed|string|null
     * }> $results
     */
    public function withResults(array $results): self
    {
        $obj = clone $this;
        $obj['results'] = $results;

        return $obj;
    }
}
