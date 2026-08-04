<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InboundThreadShape from \Telnyx\EmailInboxes\Threads\InboundThread
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type InboundThreadListResponseShape = array{
 *   data: list<InboundThread|InboundThreadShape>,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class InboundThreadListResponse implements BaseModel
{
    /** @use SdkModel<InboundThreadListResponseShape> */
    use SdkModel;

    /** @var list<InboundThread> $data */
    #[Required(list: InboundThread::class)]
    public array $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new InboundThreadListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InboundThreadListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InboundThreadListResponse)->withData(...)->withMeta(...)
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
     * @param list<InboundThread|InboundThreadShape> $data
     * @param EmailPaginationMeta|EmailPaginationMetaShape $meta
     */
    public static function with(
        array $data,
        EmailPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<InboundThread|InboundThreadShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailPaginationMeta|EmailPaginationMetaShape $meta
     */
    public function withMeta(EmailPaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
