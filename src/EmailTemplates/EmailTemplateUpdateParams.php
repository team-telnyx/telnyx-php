<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariableSchema;
use Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariablesMode;

/**
 * Updates one or more fields of the specified email template and returns the updated template.
 *
 * @see Telnyx\Services\EmailTemplatesService::update()
 *
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariableSchema
 *
 * @phpstan-type EmailTemplateUpdateParamsShape = array{
 *   autoescape?: bool|null,
 *   htmlBody?: string|null,
 *   name?: string|null,
 *   strictVariables?: bool|null,
 *   subject?: string|null,
 *   textBody?: string|null,
 *   variableSchema?: array<string,VariableSchema|VariableSchemaShape>|null,
 *   variables?: list<string>|null,
 *   variablesMode?: null|VariablesMode|value-of<VariablesMode>,
 * }
 */
final class EmailTemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateUpdateParamsShape> */
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

    /**
     * Persisted variable names. In `automatic` mode a non-null array is rejected; in `explicit` mode this is the exact manual array and each item is limited to 255 Unicode code points.
     *
     * @var list<string>|null $variables
     */
    #[Optional(list: 'string', nullable: true)]
    public ?array $variables;

    /**
     * Controls how `variables` is maintained. Setting `automatic` re-extracts immediately from the effective subject, HTML body, and text body and rejects a simultaneous non-null array. Setting `explicit` requires the exact non-null array, including valid `[]`. With the mode omitted, a non-null array selects explicit mode, null selects automatic mode, and omitting both fields preserves the current mode. Source-content changes re-extract only in automatic mode.
     *
     * @var value-of<VariablesMode>|null $variablesMode
     */
    #[Optional('variables_mode', enum: VariablesMode::class)]
    public ?string $variablesMode;

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
     * @param list<string>|Omitted|null $variables
     * @param VariablesMode|value-of<VariablesMode>|null $variablesMode
     */
    public static function with(
        string|Omitted|null $htmlBody = Omitted::VALUE,
        string|Omitted|null $subject = Omitted::VALUE,
        string|Omitted|null $textBody = Omitted::VALUE,
        Omitted|array|null $variableSchema = Omitted::VALUE,
        array|Omitted|null $variables = Omitted::VALUE,
        ?bool $autoescape = null,
        ?string $name = null,
        ?bool $strictVariables = null,
        VariablesMode|string|null $variablesMode = null,
    ): self {
        $self = new self;

        null !== $autoescape && $self['autoescape'] = $autoescape;
        Omitted::VALUE !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $name && $self['name'] = $name;
        null !== $strictVariables && $self['strictVariables'] = $strictVariables;
        Omitted::VALUE !== $subject && $self['subject'] = $subject;
        Omitted::VALUE !== $textBody && $self['textBody'] = $textBody;
        Omitted::VALUE !== $variableSchema && $self['variableSchema'] = $variableSchema;
        Omitted::VALUE !== $variables && $self['variables'] = $variables;
        null !== $variablesMode && $self['variablesMode'] = $variablesMode;

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
     * Persisted variable names. In `automatic` mode a non-null array is rejected; in `explicit` mode this is the exact manual array and each item is limited to 255 Unicode code points.
     *
     * @param list<string>|null $variables
     */
    public function withVariables(?array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }

    /**
     * Controls how `variables` is maintained. Setting `automatic` re-extracts immediately from the effective subject, HTML body, and text body and rejects a simultaneous non-null array. Setting `explicit` requires the exact non-null array, including valid `[]`. With the mode omitted, a non-null array selects explicit mode, null selects automatic mode, and omitting both fields preserves the current mode. Source-content changes re-extract only in automatic mode.
     *
     * @param VariablesMode|value-of<VariablesMode> $variablesMode
     */
    public function withVariablesMode(VariablesMode|string $variablesMode): self
    {
        $self = clone $this;
        $self['variablesMode'] = $variablesMode;

        return $self;
    }
}
