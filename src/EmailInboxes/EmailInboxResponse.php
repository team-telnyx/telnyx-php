<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailInboxShape from \Telnyx\EmailInboxes\EmailInbox
 *
 * @phpstan-type EmailInboxResponseShape = array{data: EmailInbox|EmailInboxShape}
 */
final class EmailInboxResponse implements BaseModel
{
    /** @use SdkModel<EmailInboxResponseShape> */
    use SdkModel;

    #[Required]
    public EmailInbox $data;

    /**
     * `new EmailInboxResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailInboxResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailInboxResponse)->withData(...)
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
     * @param EmailInbox|EmailInboxShape $data
     */
    public static function with(EmailInbox|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailInbox|EmailInboxShape $data
     */
    public function withData(EmailInbox|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
