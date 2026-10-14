<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List gateway token groups within the authenticated Telnyx account. Foreign and unknown resource IDs return the same 404 response.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenGroupsService::list()
 *
 * @phpstan-type TokenGroupListParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null, pageSnapshot?: string|null
 * }
 */
final class TokenGroupListParams implements BaseModel
{
    /** @use SdkModel<TokenGroupListParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?int $pageNumber;

    #[Optional]
    public ?int $pageSize;

    /**
     * Required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409.
     */
    #[Optional]
    public ?string $pageSnapshot;

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
        ?int $pageSize = null,
        ?string $pageSnapshot = null
    ): self {
        $self = new self;

        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageSnapshot && $self['pageSnapshot'] = $pageSnapshot;

        return $self;
    }

    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Required after page 1; account/filter-bound 15-minute stable snapshot; expired/mismatch 409.
     */
    public function withPageSnapshot(string $pageSnapshot): self
    {
        $self = clone $this;
        $self['pageSnapshot'] = $pageSnapshot;

        return $self;
    }
}
