<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type InboundThreadDetailShape from \Telnyx\EmailInboxes\Threads\InboundThreadDetail
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type ThreadGetResponseShape = array{
 *   data: InboundThreadDetail|InboundThreadDetailShape,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class ThreadGetResponse implements BaseModel
{
    /** @use SdkModel<ThreadGetResponseShape> */
    use SdkModel;

    #[Required]
    public InboundThreadDetail $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new ThreadGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ThreadGetResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ThreadGetResponse)->withData(...)->withMeta(...)
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
     * @param InboundThreadDetail|InboundThreadDetailShape $data
     * @param EmailPaginationMeta|EmailPaginationMetaShape $meta
     */
    public static function with(
        InboundThreadDetail|array $data,
        EmailPaginationMeta|array $meta
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param InboundThreadDetail|InboundThreadDetailShape $data
     */
    public function withData(InboundThreadDetail|array $data): self
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
