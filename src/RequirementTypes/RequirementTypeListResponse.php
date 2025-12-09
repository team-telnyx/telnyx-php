<?php

declare(strict_types=1);

namespace Telnyx\RequirementTypes;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\DocReqsRequirementType\AcceptanceCriteria;
use Telnyx\DocReqsRequirementType\Type;

/**
 * @phpstan-type RequirementTypeListResponseShape = array{
 *   data?: list<DocReqsRequirementType>|null, meta?: PaginationMeta|null
 * }
 */
final class RequirementTypeListResponse implements BaseModel
{
    /** @use SdkModel<RequirementTypeListResponseShape> */
    use SdkModel;

    /** @var list<DocReqsRequirementType>|null $data */
    #[Optional(list: DocReqsRequirementType::class)]
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
     * @param list<DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
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
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<DocReqsRequirementType|array{
     *   id?: string|null,
     *   acceptanceCriteria?: AcceptanceCriteria|null,
     *   createdAt?: string|null,
     *   description?: string|null,
     *   example?: string|null,
     *   name?: string|null,
     *   recordType?: string|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
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
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
