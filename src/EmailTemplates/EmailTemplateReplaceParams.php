<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariableSchema;

/**
 * Replaces template fields. Behaves identically to PATCH; provided for compatibility with Phoenix resource routes.
 *
 * @see Telnyx\Services\EmailTemplatesService::replace()
 *
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariableSchema
 *
 * @phpstan-type EmailTemplateReplaceParamsShape = array{
 *   autoescape?: bool|null,
 *   htmlBody?: string|null,
 *   name?: string|null,
 *   strictVariables?: bool|null,
 *   subject?: string|null,
 *   textBody?: string|null,
 *   variableSchema?: array<string,VariableSchema|VariableSchemaShape>|null,
 *   variables?: list<string>|null,
 * }
 */
final class EmailTemplateReplaceParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateReplaceParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Per-template HTML autoescaping setting.
     */
    #[Optional]
    public ?bool $autoescape;

    /**
     * Liquid template HTML body.
     */
    #[Optional('html_body', nullable: true)]
    public ?string $htmlBody;

    #[Optional]
    public ?string $name;

    /**
     * Per-template strict variable-validation setting.
     */
    #[Optional('strict_variables')]
    public ?bool $strictVariables;

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

    /**
     * Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. Set to `null` to clear the schema.
     *
     * @var array<string,VariableSchema>|null $variableSchema
     */
    #[Optional('variable_schema', map: VariableSchema::class, nullable: true)]
    public ?array $variableSchema;

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
     * @param Omitted|array<string,VariableSchema|VariableSchemaShape>|null $variableSchema
     * @param list<string>|null $variables
     */
    public static function with(
        string|Omitted|null $htmlBody = Omitted::VALUE,
        string|Omitted|null $subject = Omitted::VALUE,
        string|Omitted|null $textBody = Omitted::VALUE,
        Omitted|array|null $variableSchema = Omitted::VALUE,
        ?bool $autoescape = null,
        ?string $name = null,
        ?bool $strictVariables = null,
        ?array $variables = null,
    ): self {
        $self = new self;

        null !== $autoescape && $self['autoescape'] = $autoescape;
        Omitted::VALUE !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $name && $self['name'] = $name;
        null !== $strictVariables && $self['strictVariables'] = $strictVariables;
        Omitted::VALUE !== $subject && $self['subject'] = $subject;
        Omitted::VALUE !== $textBody && $self['textBody'] = $textBody;
        Omitted::VALUE !== $variableSchema && $self['variableSchema'] = $variableSchema;
        null !== $variables && $self['variables'] = $variables;

        return $self;
    }

    /**
     * Per-template HTML autoescaping setting.
     */
    public function withAutoescape(bool $autoescape): self
    {
        $self = clone $this;
        $self['autoescape'] = $autoescape;

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
     * Per-template strict variable-validation setting.
     */
    public function withStrictVariables(bool $strictVariables): self
    {
        $self = clone $this;
        $self['strictVariables'] = $strictVariables;

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
     * Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. Set to `null` to clear the schema.
     *
     * @param array<string,VariableSchema|VariableSchemaShape>|null $variableSchema
     */
    public function withVariableSchema(?array $variableSchema): self
    {
        $self = clone $this;
        $self['variableSchema'] = $variableSchema;

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
