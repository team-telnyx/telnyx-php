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
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $agentName && $self['agentName'] = $agentName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $profileID && $self['profileID'] = $profileID;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $userID && $self['userID'] = $userID;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * Human readable agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $self = clone $this;
        $self['agentName'] = $agentName;

        return $self;
    }

    /**
     * Date and time when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Specifies whether the agent is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    public function withProfileID(?string $profileID): self
    {
        $self = clone $this;
        $self['profileID'] = $profileID;

        return $self;
    }

    /**
     * Date and time when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * User ID associated with the RCS Agent.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * Failover URL to receive RCS events.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $self = clone $this;
        $self['webhookFailoverURL'] = $webhookFailoverURL;

        return $self;
    }

    /**
     * URL to receive RCS events.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
