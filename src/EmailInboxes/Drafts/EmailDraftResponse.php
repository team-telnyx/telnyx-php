<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Drafts;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailDraftShape from \Telnyx\EmailInboxes\Drafts\EmailDraft
 *
 * @phpstan-type EmailDraftResponseShape = array{data: EmailDraft|EmailDraftShape}
 */
final class EmailDraftResponse implements BaseModel
{
    /** @use SdkModel<EmailDraftResponseShape> */
    use SdkModel;

    /**
     * An unsent, mutable draft message belonging to an inbox.
     */
    #[Required]
    public EmailDraft $data;

    /**
     * `new EmailDraftResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailDraftResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailDraftResponse)->withData(...)
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
     * @param EmailDraft|EmailDraftShape $data
     */
    public static function with(EmailDraft|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * An unsent, mutable draft message belonging to an inbox.
     *
     * @param EmailDraft|EmailDraftShape $data
     */
    public function withData(EmailDraft|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
