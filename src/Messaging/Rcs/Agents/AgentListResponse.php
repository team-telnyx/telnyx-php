<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\Agents;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\RcsAgents\RcsAgent;

/**
 * @phpstan-type AgentListResponseShape = array{
 *   data?: list<RcsAgent>|null, meta?: PaginationMeta|null
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
    public ?PaginationMeta $meta;

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
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
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
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
