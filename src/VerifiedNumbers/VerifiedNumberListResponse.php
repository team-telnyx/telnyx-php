<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumber\RecordType;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse\Meta;

/**
 * A paginated list of Verified Numbers.
 *
 * @phpstan-type VerifiedNumberListResponseShape = array{
 *   data: list<VerifiedNumber>, meta: Meta
 * }
 */
final class VerifiedNumberListResponse implements BaseModel
{
    /** @use SdkModel<VerifiedNumberListResponseShape> */
    use SdkModel;

    /** @var list<VerifiedNumber> $data */
    #[Required(list: VerifiedNumber::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new VerifiedNumberListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifiedNumberListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifiedNumberListResponse)->withData(...)->withMeta(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<VerifiedNumber|array{
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   verified_at?: string|null,
     * }> $data
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<VerifiedNumber|array{
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   verified_at?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
