<?php

declare(strict_types=1);

namespace Telnyx\EmailThreads;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\EmailPaginationMeta;
use Telnyx\EmailInboxes\Threads\InboundThreadDetail;

/**
 * @phpstan-import-type InboundThreadDetailShape from \Telnyx\EmailInboxes\Threads\InboundThreadDetail
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type EmailThreadGetResponseShape = array{
 *   data: InboundThreadDetail|InboundThreadDetailShape,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class EmailThreadGetResponse implements BaseModel
{
    /** @use SdkModel<EmailThreadGetResponseShape> */
    use SdkModel;

    #[Required]
    public InboundThreadDetail $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new EmailThreadGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailThreadGetResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailThreadGetResponse)->withData(...)->withMeta(...)
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
