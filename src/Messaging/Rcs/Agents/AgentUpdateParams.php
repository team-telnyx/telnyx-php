<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\Agents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Modify an RCS agent.
 *
 * @see Telnyx\STAINLESS_FIXME_Messaging\STAINLESS_FIXME_Rcs\AgentsService::update()
 *
 * @phpstan-type AgentUpdateParamsShape = array{
 *   profile_id?: string|null,
 *   webhook_failover_url?: string|null,
 *   webhook_url?: string|null,
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
    #[Api(nullable: true, optional: true)]
    public ?string $profile_id;

    /**
     * Failover URL to receive RCS events.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $webhook_failover_url;

    /**
     * URL to receive RCS events.
     */
    #[Api(nullable: true, optional: true)]
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
        ?string $profile_id = null,
        ?string $webhook_failover_url = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        null !== $profile_id && $obj->profile_id = $profile_id;
        null !== $webhook_failover_url && $obj->webhook_failover_url = $webhook_failover_url;
        null !== $webhook_url && $obj->webhook_url = $webhook_url;

        return $obj;
    }

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    public function withProfileID(?string $profileID): self
    {
        $obj = clone $this;
        $obj->profile_id = $profileID;

        return $obj;
    }

    /**
     * Failover URL to receive RCS events.
     */
    public function withWebhookFailoverURL(?string $webhookFailoverURL): self
    {
        $obj = clone $this;
        $obj->webhook_failover_url = $webhookFailoverURL;

        return $obj;
    }

    /**
     * URL to receive RCS events.
     */
    public function withWebhookURL(?string $webhookURL): self
    {
        $obj = clone $this;
        $obj->webhook_url = $webhookURL;

        return $obj;
    }
}
