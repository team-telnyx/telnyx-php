<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Settings;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Status;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Type;

/**
 * @phpstan-type ActionListResponseShape = array{
 *   data?: list<SimCardGroupAction>|null, meta?: PaginationMeta|null
 * }
 */
final class ActionListResponse implements BaseModel
{
    /** @use SdkModel<ActionListResponseShape> */
    use SdkModel;

    /** @var list<SimCardGroupAction>|null $data */
    #[Optional(list: SimCardGroupAction::class)]
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
     * @param list<SimCardGroupAction|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: Settings|null,
     *   simCardGroupID?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
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
     * @param list<SimCardGroupAction|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: Settings|null,
     *   simCardGroupID?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
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
