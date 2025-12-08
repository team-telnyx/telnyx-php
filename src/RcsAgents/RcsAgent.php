<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsAgentShape = array{
 *   agent_id?: string|null,
 *   agent_name?: string|null,
 *   created_at?: \DateTimeInterface|null,
 *   enabled?: bool|null,
 *   profile_id?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 *   user_id?: string|null,
 *   webhook_failover_url?: string|null,
 *   webhook_url?: string|null,
 * }
 */
final class RcsAgent implements BaseModel
{
    /** @use SdkModel<RcsAgentShape> */
    use SdkModel;

    /**
     * RCS Agent ID.
     */
    #[Optional]
    public ?string $agent_id;

    /**
     * Human readable agent name.
     */
    #[Optional]
    public ?string $agent_name;

    /**
     * Date and time when the resource was created.
     */
    #[Optional]
    public ?\DateTimeInterface $created_at;

    /**
     * Specifies whether the agent is enabled.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    #[Optional(nullable: true)]
    public ?string $profile_id;

    /**
     * Date and time when the resource was updated.
     */
    #[Optional]
    public ?\DateTimeInterface $updated_at;

    /**
     * User ID associated with the RCS Agent.
     */
    #[Optional]
    public ?string $user_id;

    /**
     * Failover URL to receive RCS events.
     */
    #[Optional(nullable: true)]
    public ?string $webhook_failover_url;

    /**
     * URL to receive RCS events.
     */
    #[Optional(nullable: true)]
    public ?string $webhook_url;

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
        ?string $agent_id = null,
        ?string $agent_name = null,
        ?\DateTimeInterface $created_at = null,
        ?bool $enabled = null,
        ?string $profile_id = null,
        ?\DateTimeInterface $updated_at = null,
        ?string $user_id = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $agent_id && $obj['agent_id'] = $agent_id;
        null !== $agent_name && $obj['agent_name'] = $agent_name;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $profile_id && $obj['profile_id'] = $profile_id;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $user_id && $obj['user_id'] = $user_id;
        null !== $webhook_failover_url && $obj['webhook_failover_url'] = $webhook_failover_url;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agent_id'] = $agentID;

        return $obj;
    }

    /**
     * Human readable agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj['agent_name'] = $agentName;

        return $obj;
    }

    /**
     * Date and time when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Specifies whether the agent is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj['enabled'] = $enabled;

        return $obj;
    }

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    public function withProfileID(?string $profileID): self
    {
        $obj = clone $this;
        $obj['profile_id'] = $profileID;

        return $obj;
    }

    /**
     * Date and time when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * User ID associated with the RCS Agent.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['user_id'] = $userID;

        return $obj;
    }

    /**
     * Failover URL to receive RCS events.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhook_failover_url'] = $webhookFailoverURL;

        return $obj;
    }

    /**
     * URL to receive RCS events.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
