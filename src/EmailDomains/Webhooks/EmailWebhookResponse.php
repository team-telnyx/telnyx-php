<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\Webhooks;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailWebhookShape from \Telnyx\EmailDomains\Webhooks\EmailWebhook
 *
 * @phpstan-type EmailWebhookResponseShape = array{
 *   data: EmailWebhook|EmailWebhookShape
 * }
 */
final class EmailWebhookResponse implements BaseModel
{
    /** @use SdkModel<EmailWebhookResponseShape> */
    use SdkModel;

    #[Required]
    public EmailWebhook $data;

    /**
     * `new EmailWebhookResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailWebhookResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailWebhookResponse)->withData(...)
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
     * @param EmailWebhook|EmailWebhookShape $data
     */
    public static function with(EmailWebhook|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailWebhook|EmailWebhookShape $data
     */
    public function withData(EmailWebhook|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
