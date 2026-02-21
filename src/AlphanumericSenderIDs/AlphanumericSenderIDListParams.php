<?php

declare(strict_types=1);

namespace Telnyx\AlphanumericSenderIDs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List all alphanumeric sender IDs for the authenticated user.
 *
 * @see Telnyx\Services\AlphanumericSenderIDsService::list()
 *
 * @phpstan-type AlphanumericSenderIDListParamsShape = array{
 *   filterMessagingProfileID?: string|null,
 *   pageNumber?: int|null,
 *   pageSize?: int|null,
 * }
 */
final class AlphanumericSenderIDListParams implements BaseModel
{
    /** @use SdkModel<AlphanumericSenderIDListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by messaging profile ID.
     */
    #[Optional]
    public ?string $filterMessagingProfileID;

    /**
     * Page number.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Page size.
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
        ?string $filterMessagingProfileID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterMessagingProfileID && $self['filterMessagingProfileID'] = $filterMessagingProfileID;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by messaging profile ID.
     */
    public function withFilterMessagingProfileID(
        string $filterMessagingProfileID
    ): self {
        $self = clone $this;
        $self['filterMessagingProfileID'] = $filterMessagingProfileID;

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
     * Page size.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
