<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Modify an RCS agent.
 *
 * @see Telnyx\Services\Messaging\Rcs\AgentsService::update()
 *
 * @phpstan-type AgentUpdateParamsShape = array{
 *   profileID?: string|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class AgentUpdateParams implements BaseModel
{
    /** @use SdkModel<AgentUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    #[Optional('profile_id', nullable: true)]
    public ?string $profileID;

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
        ?string $profileID = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        null !== $profileID && $self['profileID'] = $profileID;
        null !== $webhookFailoverURL && $self['webhookFailoverURL'] = $webhookFailoverURL;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

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
