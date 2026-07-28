<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\EmailPaginationMeta;

/**
 * @phpstan-import-type EmailDraftShape from \Telnyx\EmailInboxes\Drafts\EmailDraft
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type DraftListResponseShape = array{
 *   data: list<EmailDraft|EmailDraftShape>,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class DraftListResponse implements BaseModel
{
    /** @use SdkModel<DraftListResponseShape> */
    use SdkModel;

    /** @var list<EmailDraft> $data */
    #[Required(list: EmailDraft::class)]
    public array $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new DraftListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DraftListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DraftListResponse)->withData(...)->withMeta(...)
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
     * @param list<EmailDraft|EmailDraftShape> $data
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
     * @param list<EmailDraft|EmailDraftShape> $data
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
