<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\SimCardAction\ActionType;
use Telnyx\SimCards\Actions\SimCardAction\Status;

/**
 * @phpstan-type ActionListResponseShape = array{
 *   data?: list<SimCardAction>|null, meta?: PaginationMeta|null
 * }
 */
final class ActionListResponse implements BaseModel
{
    /** @use SdkModel<ActionListResponseShape> */
    use SdkModel;

    /** @var list<SimCardAction>|null $data */
    #[Optional(list: SimCardAction::class)]
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
     * @param list<SimCardAction|array{
     *   id?: string|null,
     *   actionType?: value-of<ActionType>|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: array<string,mixed>|null,
     *   simCardID?: string|null,
     *   status?: Status|null,
     *   updatedAt?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<SimCardAction|array{
     *   id?: string|null,
     *   actionType?: value-of<ActionType>|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: array<string,mixed>|null,
     *   simCardID?: string|null,
     *   status?: Status|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
