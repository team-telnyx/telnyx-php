<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailInboxes\Threads\EmailPaginationMeta;

/**
 * @phpstan-import-type EmailTemplateShape from \Telnyx\EmailTemplates\EmailTemplate
 * @phpstan-import-type EmailPaginationMetaShape from \Telnyx\EmailInboxes\Threads\EmailPaginationMeta
 *
 * @phpstan-type EmailTemplateListResponseShape = array{
 *   data: list<EmailTemplate|EmailTemplateShape>,
 *   meta: EmailPaginationMeta|EmailPaginationMetaShape,
 * }
 */
final class EmailTemplateListResponse implements BaseModel
{
    /** @use SdkModel<EmailTemplateListResponseShape> */
    use SdkModel;

    /** @var list<EmailTemplate> $data */
    #[Required(list: EmailTemplate::class)]
    public array $data;

    #[Required]
    public EmailPaginationMeta $meta;

    /**
     * `new EmailTemplateListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailTemplateListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailTemplateListResponse)->withData(...)->withMeta(...)
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
     * @param list<EmailTemplate|EmailTemplateShape> $data
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
     * @param list<EmailTemplate|EmailTemplateShape> $data
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
