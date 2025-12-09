<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsAgentShape = array{
 *   agentID?: string|null,
 *   agentName?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   enabled?: bool|null,
 *   profileID?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   userID?: string|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class RcsAgent implements BaseModel
{
    /** @use SdkModel<RcsAgentShape> */
    use SdkModel;

    /**
     * RCS Agent ID.
     */
    #[Optional('agent_id')]
    public ?string $agentID;

    /**
     * Human readable agent name.
     */
    #[Optional('agent_name')]
    public ?string $agentName;

    /**
     * Date and time when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies whether the agent is enabled.
     */
    #[Optional]
    public ?bool $enabled;

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    #[Optional('profile_id', nullable: true)]
    public ?string $profileID;

    /**
     * Date and time when the resource was updated.
     */
    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    /**
     * User ID associated with the RCS Agent.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * Failover URL to receive RCS events.
     */
    #[Optional('webhook_failover_url', nullable: true)]
    public ?string $webhookFailoverURL;

    /**
     * URL to receive RCS events.
     */
    #[Optional('webhook_url', nullable: true)]
    public ?string $webhookURL;

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
        ?string $agentID = null,
        ?string $agentName = null,
        ?\DateTimeInterface $createdAt = null,
        ?bool $enabled = null,
        ?string $profileID = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $userID = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $agentID && $obj['agentID'] = $agentID;
        null !== $agentName && $obj['agentName'] = $agentName;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $enabled && $obj['enabled'] = $enabled;
        null !== $profileID && $obj['profileID'] = $profileID;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;
        null !== $userID && $obj['userID'] = $userID;
        null !== $webhookFailoverURL && $obj['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agentID'] = $agentID;

        return $obj;
    }

    /**
     * Human readable agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj['agentName'] = $agentName;

        return $obj;
    }

    /**
     * Date and time when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['profileID'] = $profileID;

        return $obj;
    }

    /**
     * Date and time when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * User ID associated with the RCS Agent.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj['userID'] = $userID;

        return $obj;
    }

    /**
     * Failover URL to receive RCS events.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj['webhookFailoverURL'] = $webhookFailoverURL;

        return $obj;
    }

    /**
     * URL to receive RCS events.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
