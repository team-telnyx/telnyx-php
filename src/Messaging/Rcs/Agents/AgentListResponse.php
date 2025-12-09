<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\Agents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\Agents\AgentListResponse\Meta;
use Telnyx\RcsAgents\RcsAgent;

/**
 * @phpstan-type AgentListResponseShape = array{
 *   data?: list<RcsAgent>|null, meta?: Meta|null
 * }
 */
final class AgentListResponse implements BaseModel
{
    /** @use SdkModel<AgentListResponseShape> */
    use SdkModel;

    /** @var list<RcsAgent>|null $data */
    #[Optional(list: RcsAgent::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RcsAgent|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }> $data
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<RcsAgent|array{
     *   agent_id?: string|null,
     *   agent_name?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profile_id?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     *   user_id?: string|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
