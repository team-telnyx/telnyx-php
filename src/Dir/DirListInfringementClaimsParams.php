<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Return the trademark or copyright claims filed against this DIR. Each claim's `status` is `pending` (newly filed; DIR auto-suspended), `contested` (you have submitted contest evidence; awaiting resolution), or `resolved` (final). Resolution outcomes: `upheld` (claim accepted; DIR stays suspended/permanently_rejected), `rejected` (claim dismissed; DIR restored to `verified`), `modified` (partial outcome).
 *
 * @see Telnyx\Services\DirService::listInfringementClaims()
 *
 * @phpstan-type DirListInfringementClaimsParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class DirListInfringementClaimsParams implements BaseModel
{
    /** @use SdkModel<DirListInfringementClaimsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    #[Optional]
    public ?int $pageNumber;

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
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
     * 1-based page number. Out-of-range values return an empty page with correct meta.
     */
    public function withPageNumber(int $pageNumber): self
    {
        $self = clone $this;
        $self['pageNumber'] = $pageNumber;

        return $self;
    }

    /**
     * Items per page. Maximum 250; values above are clamped to 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
