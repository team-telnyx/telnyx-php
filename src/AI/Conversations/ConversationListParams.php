<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a list of all AI conversations configured by the user. Supports [PostgREST-style query parameters](https://postgrest.org/en/stable/api.html#horizontal-filtering-rows) for filtering. Examples are included for the standard metadata fields, but you can filter on any field in the metadata JSON object. For example, to filter by a custom field `metadata->custom_field`, use `metadata->custom_field=eq.value`.
 *
 * @see Telnyx\Services\AI\ConversationsService::list()
 *
 * @phpstan-type ConversationListParamsShape = array{
 *   id?: string,
 *   created_at?: string,
 *   last_message_at?: string,
 *   limit?: int,
 *   metadata__assistant_id?: string,
 *   metadata__call_control_id?: string,
 *   metadata__telnyx_agent_target?: string,
 *   metadata__telnyx_conversation_channel?: string,
 *   metadata__telnyx_end_user_target?: string,
 *   name?: string,
 *   or?: string,
 *   order?: string,
 * }
 */
final class ConversationListParams implements BaseModel
{
    /** @use SdkModel<ConversationListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by conversation ID (e.g. id=eq.123).
     */
    #[Optional]
    public ?string $id;

    /**
     * Filter by creation datetime (e.g., `created_at=gte.2025-01-01`).
     */
    #[Optional]
    public ?string $created_at;

    /**
     * Filter by last message datetime (e.g., `last_message_at=lte.2025-06-01`).
     */
    #[Optional]
    public ?string $last_message_at;

    /**
     * Limit the number of returned conversations (e.g., `limit=10`).
     */
    #[Optional]
    public ?int $limit;

    /**
     * Filter by assistant ID (e.g., `metadata->assistant_id=eq.assistant-123`).
     */
    #[Optional]
    public ?string $metadata__assistant_id;

    /**
     * Filter by call control ID (e.g., `metadata->call_control_id=eq.v3:123`).
     */
    #[Optional]
    public ?string $metadata__call_control_id;

    /**
     * Filter by the phone number, SIP URI, or other identifier for the agent (e.g., `metadata->telnyx_agent_target=eq.+13128675309`).
     */
    #[Optional]
    public ?string $metadata__telnyx_agent_target;

    /**
     * Filter by conversation channel (e.g., `metadata->telnyx_conversation_channel=eq.phone_call`).
     */
    #[Optional]
    public ?string $metadata__telnyx_conversation_channel;

    /**
     * Filter by the phone number, SIP URI, or other identifier for the end user (e.g., `metadata->telnyx_end_user_target=eq.+13128675309`).
     */
    #[Optional]
    public ?string $metadata__telnyx_end_user_target;

    /**
     * Filter by conversation Name (e.g. `name=like.Voice%`).
     */
    #[Optional]
    public ?string $name;

    /**
     * Apply OR conditions using PostgREST syntax (e.g., `or=(created_at.gte.2025-04-01,last_message_at.gte.2025-04-01)`).
     */
    #[Optional]
    public ?string $or;

    /**
     * Order the results by specific fields (e.g., `order=created_at.desc` or `order=last_message_at.asc`).
     */
    #[Optional]
    public ?string $order;

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
        ?string $id = null,
        ?string $created_at = null,
        ?string $last_message_at = null,
        ?int $limit = null,
        ?string $metadata__assistant_id = null,
        ?string $metadata__call_control_id = null,
        ?string $metadata__telnyx_agent_target = null,
        ?string $metadata__telnyx_conversation_channel = null,
        ?string $metadata__telnyx_end_user_target = null,
        ?string $name = null,
        ?string $or = null,
        ?string $order = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $last_message_at && $obj['last_message_at'] = $last_message_at;
        null !== $limit && $obj['limit'] = $limit;
        null !== $metadata__assistant_id && $obj['metadata__assistant_id'] = $metadata__assistant_id;
        null !== $metadata__call_control_id && $obj['metadata__call_control_id'] = $metadata__call_control_id;
        null !== $metadata__telnyx_agent_target && $obj['metadata__telnyx_agent_target'] = $metadata__telnyx_agent_target;
        null !== $metadata__telnyx_conversation_channel && $obj['metadata__telnyx_conversation_channel'] = $metadata__telnyx_conversation_channel;
        null !== $metadata__telnyx_end_user_target && $obj['metadata__telnyx_end_user_target'] = $metadata__telnyx_end_user_target;
        null !== $name && $obj['name'] = $name;
        null !== $or && $obj['or'] = $or;
        null !== $order && $obj['order'] = $order;

        return $obj;
    }

    /**
     * Filter by conversation ID (e.g. id=eq.123).
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Filter by creation datetime (e.g., `created_at=gte.2025-01-01`).
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Filter by last message datetime (e.g., `last_message_at=lte.2025-06-01`).
     */
    public function withLastMessageAt(string $lastMessageAt): self
    {
        $obj = clone $this;
        $obj['last_message_at'] = $lastMessageAt;

        return $obj;
    }

    /**
     * Limit the number of returned conversations (e.g., `limit=10`).
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj['limit'] = $limit;

        return $obj;
    }

    /**
     * Filter by assistant ID (e.g., `metadata->assistant_id=eq.assistant-123`).
     */
    public function withMetadataAssistantID(string $metadataAssistantID): self
    {
        $obj = clone $this;
        $obj['metadata__assistant_id'] = $metadataAssistantID;

        return $obj;
    }

    /**
     * Filter by call control ID (e.g., `metadata->call_control_id=eq.v3:123`).
     */
    public function withMetadataCallControlID(
        string $metadataCallControlID
    ): self {
        $obj = clone $this;
        $obj['metadata__call_control_id'] = $metadataCallControlID;

        return $obj;
    }

    /**
     * Filter by the phone number, SIP URI, or other identifier for the agent (e.g., `metadata->telnyx_agent_target=eq.+13128675309`).
     */
    public function withMetadataTelnyxAgentTarget(
        string $metadataTelnyxAgentTarget
    ): self {
        $obj = clone $this;
        $obj['metadata__telnyx_agent_target'] = $metadataTelnyxAgentTarget;

        return $obj;
    }

    /**
     * Filter by conversation channel (e.g., `metadata->telnyx_conversation_channel=eq.phone_call`).
     */
    public function withMetadataTelnyxConversationChannel(
        string $metadataTelnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj['metadata__telnyx_conversation_channel'] = $metadataTelnyxConversationChannel;

        return $obj;
    }

    /**
     * Filter by the phone number, SIP URI, or other identifier for the end user (e.g., `metadata->telnyx_end_user_target=eq.+13128675309`).
     */
    public function withMetadataTelnyxEndUserTarget(
        string $metadataTelnyxEndUserTarget
    ): self {
        $obj = clone $this;
        $obj['metadata__telnyx_end_user_target'] = $metadataTelnyxEndUserTarget;

        return $obj;
    }

    /**
     * Filter by conversation Name (e.g. `name=like.Voice%`).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Apply OR conditions using PostgREST syntax (e.g., `or=(created_at.gte.2025-04-01,last_message_at.gte.2025-04-01)`).
     */
    public function withOr(string $or): self
    {
        $obj = clone $this;
        $obj['or'] = $or;

        return $obj;
    }

    /**
     * Order the results by specific fields (e.g., `order=created_at.desc` or `order=last_message_at.asc`).
     */
    public function withOrder(string $order): self
    {
        $obj = clone $this;
        $obj['order'] = $order;

        return $obj;
    }
}
