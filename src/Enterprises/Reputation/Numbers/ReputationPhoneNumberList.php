<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\Numbers;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Enterprises\NumberReputationPaginationMeta;

/**
 * @phpstan-import-type ReputationPhoneNumberShape from \Telnyx\Enterprises\Reputation\Numbers\ReputationPhoneNumber
 * @phpstan-import-type NumberReputationPaginationMetaShape from \Telnyx\Enterprises\NumberReputationPaginationMeta
 *
 * @phpstan-type ReputationPhoneNumberListShape = array{
 *   data: list<ReputationPhoneNumber|ReputationPhoneNumberShape>,
 *   meta: NumberReputationPaginationMeta|NumberReputationPaginationMetaShape,
 * }
 */
final class ReputationPhoneNumberList implements BaseModel
{
    /** @use SdkModel<ReputationPhoneNumberListShape> */
    use SdkModel;

    /** @var list<ReputationPhoneNumber> $data */
    #[Required(list: ReputationPhoneNumber::class)]
    public array $data;

    /**
     * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
     */
    #[Required]
    public NumberReputationPaginationMeta $meta;

    /**
     * `new ReputationPhoneNumberList()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ReputationPhoneNumberList::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ReputationPhoneNumberList)->withData(...)->withMeta(...)
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
     * @param list<ReputationPhoneNumber|ReputationPhoneNumberShape> $data
     * @param NumberReputationPaginationMeta|NumberReputationPaginationMetaShape $meta
     */
    public static function with(
        array $data,
        NumberReputationPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<ReputationPhoneNumber|ReputationPhoneNumberShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * JSON:API pagination metadata returned with every paginated list response. Page numbering is 1-based. `page_size` reports the number of items actually returned in `data` for this page; the requested size is taken from the `page[size]` query parameter.
     *
     * @param NumberReputationPaginationMeta|NumberReputationPaginationMetaShape $meta
     */
    public function withMeta(NumberReputationPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
