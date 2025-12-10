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
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profileID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<RcsAgent|array{
     *   agentID?: string|null,
     *   agentName?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   enabled?: bool|null,
     *   profileID?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     *   userID?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
