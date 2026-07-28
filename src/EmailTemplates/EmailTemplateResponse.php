<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type EmailTemplateShape from \Telnyx\EmailTemplates\EmailTemplate
 *
 * @phpstan-type EmailTemplateResponseShape = array{
 *   data: EmailTemplate|EmailTemplateShape
 * }
 */
final class EmailTemplateResponse implements BaseModel
{
    /** @use SdkModel<EmailTemplateResponseShape> */
    use SdkModel;

    #[Required]
    public EmailTemplate $data;

    /**
     * `new EmailTemplateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailTemplateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailTemplateResponse)->withData(...)
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
     * @param EmailTemplate|EmailTemplateShape $data
     */
    public static function with(EmailTemplate|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param EmailTemplate|EmailTemplateShape $data
     */
    public function withData(EmailTemplate|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
