<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type rcs_agent = array{
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
    /** @use SdkModel<rcs_agent> */
    use SdkModel;

    /**
     * RCS Agent ID.
     */
    #[Api('agent_id', optional: true)]
    public ?string $agentID;

    /**
     * Human readable agent name.
     */
    #[Api('agent_name', optional: true)]
    public ?string $agentName;

    /**
     * Date and time when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /**
     * Specifies whether the agent is enabled.
     */
    #[Api(optional: true)]
    public ?bool $enabled;

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    #[Api('profile_id', nullable: true, optional: true)]
    public ?string $profileID;

    /**
     * Date and time when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * User ID associated with the RCS Agent.
     */
    #[Api('user_id', optional: true)]
    public ?string $userID;

    /**
     * Failover URL to receive RCS events.
     */
    #[Api('webhook_failover_url', nullable: true, optional: true)]
    public ?string $webhookFailoverURL;

    /**
     * URL to receive RCS events.
     */
    #[Api('webhook_url', nullable: true, optional: true)]
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

        null !== $agentID && $obj->agentID = $agentID;
        null !== $agentName && $obj->agentName = $agentName;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $enabled && $obj->enabled = $enabled;
        null !== $profileID && $obj->profileID = $profileID;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;
        null !== $userID && $obj->userID = $userID;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj->agentID = $agentID;

        return $obj;
    }

    /**
     * Human readable agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj->agentName = $agentName;

        return $obj;
    }

    /**
     * Date and time when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * Specifies whether the agent is enabled.
     */
    public function withEnabled(bool $enabled): self
    {
        $obj = clone $this;
        $obj->enabled = $enabled;

        return $obj;
    }

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    public function withProfileID(?string $profileID): self
    {
        $obj = clone $this;
        $obj->profileID = $profileID;

        return $obj;
    }

    /**
     * Date and time when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * User ID associated with the RCS Agent.
     */
    public function withUserID(string $userID): self
    {
        $obj = clone $this;
        $obj->userID = $userID;

        return $obj;
    }

    /**
     * Failover URL to receive RCS events.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhookFailoverURL = $webhookFailoverURL;

        return $obj;
    }

    /**
     * URL to receive RCS events.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhookURL = $webhookURL;

        return $obj;
    }
}
