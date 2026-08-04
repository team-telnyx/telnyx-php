<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\EmailInboxListResponse\Meta;

/**
 * @phpstan-import-type EmailInboxShape from \Telnyx\EmailInboxes\EmailInbox
 * @phpstan-import-type MetaShape from \Telnyx\EmailInboxes\EmailInboxListResponse\Meta
 *
 * @phpstan-type EmailInboxListResponseShape = array{
 *   data: list<EmailInbox|EmailInboxShape>, meta: Meta|MetaShape
 * }
 */
final class EmailInboxListResponse implements BaseModel
{
    /** @use SdkModel<EmailInboxListResponseShape> */
    use SdkModel;

    /** @var list<EmailInbox> $data */
    #[Required(list: EmailInbox::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new EmailInboxListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailInboxListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailInboxListResponse)->withData(...)->withMeta(...)
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
     * @param list<EmailInbox|EmailInboxShape> $data
     * @param Meta|MetaShape $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<EmailInbox|EmailInboxShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
