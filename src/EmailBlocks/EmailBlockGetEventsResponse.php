<?php

declare(strict_types=1);

namespace Telnyx\EmailBlocks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailBlocks\EmailBlockGetEventsResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailBlocks\EmailBlockGetEventsResponse\Data
 * @phpstan-import-type OffsetMetaShape from \Telnyx\EmailBlocks\OffsetMeta
 *
 * @phpstan-type EmailBlockGetEventsResponseShape = array{
 *   data: list<Data|DataShape>, meta: OffsetMeta|OffsetMetaShape
 * }
 */
final class EmailBlockGetEventsResponse implements BaseModel
{
    /** @use SdkModel<EmailBlockGetEventsResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public OffsetMeta $meta;

    /**
     * `new EmailBlockGetEventsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailBlockGetEventsResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailBlockGetEventsResponse)->withData(...)->withMeta(...)
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
     * @param list<Data|DataShape> $data
     * @param OffsetMeta|OffsetMetaShape $meta
     */
    public static function with(array $data, OffsetMeta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param OffsetMeta|OffsetMetaShape $meta
     */
    public function withMeta(OffsetMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
