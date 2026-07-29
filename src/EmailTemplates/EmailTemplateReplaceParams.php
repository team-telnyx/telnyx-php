<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Replaces template fields. Behaves identically to PATCH; provided for compatibility with Phoenix resource routes.
 *
 * @see Telnyx\Services\EmailTemplatesService::replace()
 *
 * @phpstan-type EmailTemplateReplaceParamsShape = array{
 *   htmlBody?: string|null,
 *   name?: string|null,
 *   subject?: string|null,
 *   textBody?: string|null,
 *   variables?: list<string>|null,
 * }
 */
final class EmailTemplateReplaceParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Liquid template HTML body.
     */
    #[Optional('html_body', nullable: true)]
    public ?string $htmlBody;

    #[Optional]
    public ?string $name;

    /**
     * Liquid template subject.
     */
    #[Optional(nullable: true)]
    public ?string $subject;

    /**
     * Liquid template text body.
     */
    #[Optional('text_body', nullable: true)]
    public ?string $textBody;

    /** @var list<string>|null $variables */
    #[Optional(list: 'string')]
    public ?array $variables;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $variables
     */
    public static function with(
        ?string $htmlBody = null,
        ?string $name = null,
        ?string $subject = null,
        ?string $textBody = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        null !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $name && $self['name'] = $name;
        null !== $subject && $self['subject'] = $subject;
        null !== $textBody && $self['textBody'] = $textBody;
        null !== $variables && $self['variables'] = $variables;

        return $self;
    }

    /**
     * Liquid template HTML body.
     */
    public function withHTMLBody(?string $htmlBody): self
    {
        $self = clone $this;
        $self['htmlBody'] = $htmlBody;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Liquid template subject.
     */
    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

        return $self;
    }

    /**
     * Liquid template text body.
     */
    public function withTextBody(?string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }

    /**
     * @param list<string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }
}
