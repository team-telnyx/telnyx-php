<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists the account's Agent Gateway instances, newest first, one page at a time.
 *
 * @see Telnyx\Services\AgentGatewaysService::list()
 *
 * @phpstan-type AgentGatewayListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class AgentGatewayListParams implements BaseModel
{
    /** @use SdkModel<AgentGatewayListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The page to return, counting from 1.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Results per page.
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
     * The page to return, counting from 1.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Results per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
