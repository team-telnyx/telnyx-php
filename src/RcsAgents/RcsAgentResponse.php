<?php

declare(strict_types=1);

namespace Telnyx\RcsAgents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RcsAgentResponseShape = array{data?: RcsAgent|null}
 */
final class RcsAgentResponse implements BaseModel
{
    /** @use SdkModel<RcsAgentResponseShape> */
    use SdkModel;

    #[Optional]
    public ?RcsAgent $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RcsAgent|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * } $data
     */
    public static function with(RcsAgent|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param RcsAgent|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * } $data
     */
    public function withData(RcsAgent|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
