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
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   verifiedAt?: string|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<VerifiedNumber|array{
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   verifiedAt?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
