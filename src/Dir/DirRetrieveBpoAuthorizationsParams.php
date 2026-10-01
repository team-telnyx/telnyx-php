<?php

declare(strict_types=1);

namespace Telnyx\Dir;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * List the BPO (Business Process Outsourcer) accounts a Brand Owner has authorized on this DIR, together with the review state of each authorization.
 *
 * Authorizations are supplied as the `bpo_authorizations` array when creating or updating a DIR, and each one is reviewed on its own. Only an `approved` authorization adds that BPO to this DIR's authorized callers in the branded calling registry; `pending` and `rejected` authorizations do not. Each entry includes the `loa_document_id` you submitted: because `bpo_authorizations` replaces the whole list on every DIR update, send each entry you want to keep back with its `loa_document_id` unchanged, and it keeps its review state. A rejected entry carries a `rejection_reason`. Returns an empty list when the DIR has authorized no BPOs.
 *
 * @see Telnyx\Services\DirService::retrieveBpoAuthorizations()
 *
 * @phpstan-type DirRetrieveBpoAuthorizationsParamsShape = array{
 *   pageNumber?: int|null, pageSize?: int|null
 * }
 */
final class DirRetrieveBpoAuthorizationsParams implements BaseModel
{
    /** @use SdkModel<DirRetrieveBpoAuthorizationsParamsShape> */
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
