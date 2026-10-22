<?php

declare(strict_types=1);

namespace Telnyx\Compute\Funcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List functions for the authenticated organization. Each function includes its persisted function-scoped bindings. Actor bindings expose actor_type and env_name, allowing clients to identify every function attached to a Stateful Actor type.
 *
 * @see Telnyx\Services\Compute\FuncsService::list()
 *
 * @phpstan-type FuncListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class FuncListParams implements BaseModel
{
    /** @use SdkModel<FuncListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Page size (maximum 250).
     */
    #[Optional]
    public ?int $pageSize;

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
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Page number.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Page size (maximum 250).
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
