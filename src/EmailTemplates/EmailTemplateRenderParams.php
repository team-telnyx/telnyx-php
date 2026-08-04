<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Renders a template using the provided Liquid variables. Missing `template_variables` defaults to `{}`.
 *
 * @see Telnyx\Services\EmailTemplatesService::render()
 *
 * @phpstan-type EmailTemplateRenderParamsShape = array{
 *   templateVariables?: array<string,mixed>|null
 * }
 */
final class EmailTemplateRenderParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateRenderParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Variables for Liquid template rendering. Non-object values are silently treated as an empty object.
     *
     * @var array<string,mixed>|null $templateVariables
     */
    #[Optional('template_variables', map: 'mixed')]
    public ?array $templateVariables;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param array<string,mixed>|null $templateVariables
     */
    public static function with(?array $templateVariables = null): self
    {
        $self = new self;

        null !== $templateVariables && $self['templateVariables'] = $templateVariables;

        return $self;
    }

    /**
     * Variables for Liquid template rendering. Non-object values are silently treated as an empty object.
     *
     * @param array<string,mixed> $templateVariables
     */
    public function withTemplateVariables(array $templateVariables): self
    {
        $self = clone $this;
        $self['templateVariables'] = $templateVariables;

        return $self;
    }
}
