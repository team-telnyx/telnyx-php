<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailTemplates\EmailTemplateRenderResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\EmailTemplates\EmailTemplateRenderResponse\Data
 *
 * @phpstan-type EmailTemplateRenderResponseShape = array{data: Data|DataShape}
 */
final class EmailTemplateRenderResponse implements BaseModel
{
    /** @use SdkModel<EmailTemplateRenderResponseShape> */
    use SdkModel;

    /**
     * Template object with `subject`, `html_body`, and `text_body` replaced by their Liquid-rendered values. All other template fields (id, name, variables, etc.) remain unchanged.
     */
    #[Required]
    public Data $data;

    /**
     * `new EmailTemplateRenderResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailTemplateRenderResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailTemplateRenderResponse)->withData(...)
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
     * @param Data|DataShape $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * Template object with `subject`, `html_body`, and `text_body` replaced by their Liquid-rendered values. All other template fields (id, name, variables, etc.) remain unchanged.
     *
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
