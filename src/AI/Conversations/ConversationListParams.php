<?php

declare(strict_types=1);

namespace Telnyx\AI\Conversations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a list of all AI conversations configured by the user. Supports [PostgREST-style query parameters](https://postgrest.org/en/stable/api.html#horizontal-filtering-rows) for filtering. Examples are included for the standard metadata fields, but you can filter on any field in the metadata JSON object. For example, to filter by a custom field `metadata->custom_field`, use `metadata->custom_field=eq.value`.
 *
 * @see Telnyx\AI\Conversations->list
 *
 * @phpstan-type ConversationListParamsShape = array{
 *   id?: string,
 *   createdAt?: string,
 *   lastMessageAt?: string,
 *   limit?: int,
 *   metadataAssistantID?: string,
 *   metadataCallControlID?: string,
 *   metadataTelnyxAgentTarget?: string,
 *   metadataTelnyxConversationChannel?: string,
 *   metadataTelnyxEndUserTarget?: string,
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
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Filter by creation datetime (e.g., `created_at=gte.2025-01-01`).
     */
    #[Api(optional: true)]
    public ?string $createdAt;

    /**
     * Filter by last message datetime (e.g., `last_message_at=lte.2025-06-01`).
     */
    #[Api(optional: true)]
    public ?string $lastMessageAt;

    /**
     * Limit the number of returned conversations (e.g., `limit=10`).
     */
    #[Api(optional: true)]
    public ?int $limit;

    /**
     * Filter by assistant ID (e.g., `metadata->assistant_id=eq.assistant-123`).
     */
    #[Api(optional: true)]
    public ?string $metadataAssistantID;

    /**
     * Filter by call control ID (e.g., `metadata->call_control_id=eq.v3:123`).
     */
    #[Api(optional: true)]
    public ?string $metadataCallControlID;

    /**
     * Filter by the phone number, SIP URI, or other identifier for the agent (e.g., `metadata->telnyx_agent_target=eq.+13128675309`).
     */
    #[Api(optional: true)]
    public ?string $metadataTelnyxAgentTarget;

    /**
     * Filter by conversation channel (e.g., `metadata->telnyx_conversation_channel=eq.phone_call`).
     */
    #[Api(optional: true)]
    public ?string $metadataTelnyxConversationChannel;

    /**
     * Filter by the phone number, SIP URI, or other identifier for the end user (e.g., `metadata->telnyx_end_user_target=eq.+13128675309`).
     */
    #[Api(optional: true)]
    public ?string $metadataTelnyxEndUserTarget;

    /**
     * Filter by conversation Name (e.g. `name=like.Voice%`).
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Apply OR conditions using PostgREST syntax (e.g., `or=(created_at.gte.2025-04-01,last_message_at.gte.2025-04-01)`).
     */
    #[Api(optional: true)]
    public ?string $or;

    /**
     * Order the results by specific fields (e.g., `order=created_at.desc` or `order=last_message_at.asc`).
     */
    #[Api(optional: true)]
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
        ?string $createdAt = null,
        ?string $lastMessageAt = null,
        ?int $limit = null,
        ?string $metadataAssistantID = null,
        ?string $metadataCallControlID = null,
        ?string $metadataTelnyxAgentTarget = null,
        ?string $metadataTelnyxConversationChannel = null,
        ?string $metadataTelnyxEndUserTarget = null,
        ?string $name = null,
        ?string $or = null,
        ?string $order = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $lastMessageAt && $obj->lastMessageAt = $lastMessageAt;
        null !== $limit && $obj->limit = $limit;
        null !== $metadataAssistantID && $obj->metadataAssistantID = $metadataAssistantID;
        null !== $metadataCallControlID && $obj->metadataCallControlID = $metadataCallControlID;
        null !== $metadataTelnyxAgentTarget && $obj->metadataTelnyxAgentTarget = $metadataTelnyxAgentTarget;
        null !== $metadataTelnyxConversationChannel && $obj->metadataTelnyxConversationChannel = $metadataTelnyxConversationChannel;
        null !== $metadataTelnyxEndUserTarget && $obj->metadataTelnyxEndUserTarget = $metadataTelnyxEndUserTarget;
        null !== $name && $obj->name = $name;
        null !== $or && $obj->or = $or;
        null !== $order && $obj->order = $order;

        return $obj;
    }

    /**
     * Filter by conversation ID (e.g. id=eq.123).
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Filter by creation datetime (e.g., `created_at=gte.2025-01-01`).
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Filter by last message datetime (e.g., `last_message_at=lte.2025-06-01`).
     */
    public function withLastMessageAt(string $lastMessageAt): self
    {
        $obj = clone $this;
        $obj->lastMessageAt = $lastMessageAt;

        return $obj;
    }

    /**
     * Limit the number of returned conversations (e.g., `limit=10`).
     */
    public function withLimit(int $limit): self
    {
        $obj = clone $this;
        $obj->limit = $limit;

        return $obj;
    }

    /**
     * Filter by assistant ID (e.g., `metadata->assistant_id=eq.assistant-123`).
     */
    public function withMetadataAssistantID(string $metadataAssistantID): self
    {
        $obj = clone $this;
        $obj->metadataAssistantID = $metadataAssistantID;

        return $obj;
    }

    /**
     * Filter by call control ID (e.g., `metadata->call_control_id=eq.v3:123`).
     */
    public function withMetadataCallControlID(
        string $metadataCallControlID
    ): self {
        $obj = clone $this;
        $obj->metadataCallControlID = $metadataCallControlID;

        return $obj;
    }

    /**
     * Filter by the phone number, SIP URI, or other identifier for the agent (e.g., `metadata->telnyx_agent_target=eq.+13128675309`).
     */
    public function withMetadataTelnyxAgentTarget(
        string $metadataTelnyxAgentTarget
    ): self {
        $obj = clone $this;
        $obj->metadataTelnyxAgentTarget = $metadataTelnyxAgentTarget;

        return $obj;
    }

    /**
     * Filter by conversation channel (e.g., `metadata->telnyx_conversation_channel=eq.phone_call`).
     */
    public function withMetadataTelnyxConversationChannel(
        string $metadataTelnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj->metadataTelnyxConversationChannel = $metadataTelnyxConversationChannel;

        return $obj;
    }

    /**
     * Filter by the phone number, SIP URI, or other identifier for the end user (e.g., `metadata->telnyx_end_user_target=eq.+13128675309`).
     */
    public function withMetadataTelnyxEndUserTarget(
        string $metadataTelnyxEndUserTarget
    ): self {
        $obj = clone $this;
        $obj->metadataTelnyxEndUserTarget = $metadataTelnyxEndUserTarget;

        return $obj;
    }

    /**
     * Filter by conversation Name (e.g. `name=like.Voice%`).
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Apply OR conditions using PostgREST syntax (e.g., `or=(created_at.gte.2025-04-01,last_message_at.gte.2025-04-01)`).
     */
    public function withOr(string $or): self
    {
        $obj = clone $this;
        $obj->or = $or;

        return $obj;
    }

    /**
     * Order the results by specific fields (e.g., `order=created_at.desc` or `order=last_message_at.asc`).
     */
    public function withOrder(string $order): self
    {
        $obj = clone $this;
        $obj->order = $order;

        return $obj;
    }
}
