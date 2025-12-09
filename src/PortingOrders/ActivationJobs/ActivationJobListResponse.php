<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\ActivationJobs;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrdersActivationJob;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationType;
use Telnyx\PortingOrders\PortingOrdersActivationJob\ActivationWindow;
use Telnyx\PortingOrders\PortingOrdersActivationJob\Status;

/**
 * @phpstan-type ActivationJobListResponseShape = array{
 *   data?: list<PortingOrdersActivationJob>|null, meta?: PaginationMeta|null
 * }
 */
final class ActivationJobListResponse implements BaseModel
{
    /** @use SdkModel<ActivationJobListResponseShape> */
    use SdkModel;

    /** @var list<PortingOrdersActivationJob>|null $data */
    #[Optional(list: PortingOrdersActivationJob::class)]
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
     * @param list<PortingOrdersActivationJob|array{
     *   id?: string|null,
     *   activateAt?: \DateTimeInterface|null,
     *   activationType?: value-of<ActivationType>|null,
     *   activationWindows?: list<ActivationWindow>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
     * @param list<PortingOrdersActivationJob|array{
     *   id?: string|null,
     *   activateAt?: \DateTimeInterface|null,
     *   activationType?: value-of<ActivationType>|null,
     *   activationWindows?: list<ActivationWindow>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   recordType?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: \DateTimeInterface|null,
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
