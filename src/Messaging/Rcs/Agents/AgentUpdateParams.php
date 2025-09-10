<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\Agents;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new AgentUpdateParams); // set properties as needed
 * $client->messaging.rcs.agents->update(...$params->toArray());
 * ```
 * Modify an RCS agent.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->messaging.rcs.agents->update(...$params->toArray());`
 *
 * @see Telnyx\Messaging\Rcs\Agents->update
 *
 * @phpstan-type agent_update_params = array{
 *   profileID?: string|null,
 *   webhookFailoverURL?: string|null,
 *   webhookURL?: string|null,
 * }
 */
final class AgentUpdateParams implements BaseModel
{
    /** @use SdkModel<agent_update_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Messaging profile ID associated with the RCS Agent.
     */
    #[Api('profile_id', nullable: true, optional: true)]
    public ?string $profileID;

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
        ?string $profileID = null,
        ?string $webhookFailoverURL = null,
        ?string $webhookURL = null,
    ): self {
        $obj = new self;

        null !== $profileID && $obj->profileID = $profileID;
        null !== $webhookFailoverURL && $obj->webhookFailoverURL = $webhookFailoverURL;
        null !== $webhookURL && $obj->webhookURL = $webhookURL;

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
