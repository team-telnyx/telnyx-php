<?php

declare(strict_types=1);

namespace Telnyx\Enterprises;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve a paginated list of enterprises associated with your account.
 *
 * @see Telnyx\Services\EnterprisesService::list()
 *
 * @phpstan-type EnterpriseListParamsShape = array{
 *   legalName?: string|null, pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class EnterpriseListParams implements BaseModel
{
    /** @use SdkModel<EnterpriseListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter by legal name (partial match).
     */
    #[Optional]
    public ?string $legalName;

    /**
     * Page number (1-indexed).
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Number of items per page.
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
        ?string $legalName = null,
        ?int $pageNumber = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $legalName && $self['legalName'] = $legalName;
        null !== $pageNumber && $self['pageNumber'] = $pageNumber;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Filter by legal name (partial match).
     */
    public function withLegalName(string $legalName): self
    {
        $self = clone $this;
        $self['legalName'] = $legalName;

        return $self;
    }

    /**
     * Page number (1-indexed).
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Number of items per page.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
