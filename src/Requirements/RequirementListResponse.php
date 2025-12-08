<?php

declare(strict_types=1);

namespace Telnyx\Requirements;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DocReqsRequirementType;
use Telnyx\Requirements\RequirementListResponse\Data;
use Telnyx\Requirements\RequirementListResponse\Data\Action;
use Telnyx\Requirements\RequirementListResponse\Data\PhoneNumberType;

/**
 * @phpstan-type RequirementListResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class RequirementListResponse implements BaseModel
{
    /** @use SdkModel<RequirementListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<Data|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   locality?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   requirements_types?: list<DocReqsRequirementType>|null,
     *   updated_at?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
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
     * @param list<Data|array{
     *   id?: string|null,
     *   action?: value-of<Action>|null,
     *   country_code?: string|null,
     *   created_at?: string|null,
     *   locality?: string|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     *   requirements_types?: list<DocReqsRequirementType>|null,
     *   updated_at?: string|null,
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
