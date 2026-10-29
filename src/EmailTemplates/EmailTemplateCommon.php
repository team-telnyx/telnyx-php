<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailTemplates\EmailTemplateCommon\RecordType;
use Telnyx\EmailTemplates\EmailTemplateCommon\VariablesMode;

/**
 * @phpstan-import-type VariableSchemaEntryShape from \Telnyx\EmailTemplates\VariableSchemaEntry
 *
 * @phpstan-type EmailTemplateCommonShape = array{
 *   id: string,
 *   autoescape: bool,
 *   createdAt: \DateTimeInterface,
 *   htmlBody: string|null,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   strictVariables: bool,
 *   textBody: string|null,
 *   updatedAt: \DateTimeInterface,
 *   variableSchema: array<string,VariableSchemaEntry|VariableSchemaEntryShape>|null,
 *   variables: list<string>,
 *   variablesMode: VariablesMode|value-of<VariablesMode>,
 * }
 */
final class EmailTemplateCommon implements BaseModel
{
    /** @use SdkModel<EmailTemplateCommonShape> */
    use SdkModel;

    #[Required]
    public string $id;

    /**
     * Whether HTML autoescaping is enabled for this template. When `true`, only rendered `html_body` expression output is HTML-escaped at the output boundary; `subject` and `text_body` are never autoescaped.
     */
    #[Required]
    public bool $autoescape;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('html_body')]
    public ?string $htmlBody;

    #[Required]
    public string $name;

    /** @var value-of<RecordType> $recordType */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Whether strict variable validation is enabled for this template. When `true`, sends and renders that are missing a variable marked `required: true` in `variable_schema` fail with 422 naming the variable.
     */
    #[Required('strict_variables')]
    public bool $strictVariables;

    #[Required('text_body')]
    public ?string $textBody;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * Structured variable requirements, or `null` when the template uses only the legacy `variables` array.
     *
     * @var array<string,VariableSchemaEntry>|null $variableSchema
     */
    #[Required('variable_schema', map: VariableSchemaEntry::class)]
    public ?array $variableSchema;

    /**
     * Persisted variable names. In `explicit` mode this array preserves the exact provided order, duplicates, and string contents; in `automatic` mode it is derived from the stored subject and bodies.
     *
     * @var list<string> $variables
     */
    #[Required(list: 'string')]
    public array $variables;

    /**
     * `automatic` when variable names are derived from template content; `explicit` when `variables` is the exact manually managed array.
     *
     * @var value-of<VariablesMode> $variablesMode
     */
    #[Required('variables_mode', enum: VariablesMode::class)]
    public string $variablesMode;

    /**
     * `new EmailTemplateCommon()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailTemplateCommon::with(
     *   id: ...,
     *   autoescape: ...,
     *   createdAt: ...,
     *   htmlBody: ...,
     *   name: ...,
     *   recordType: ...,
     *   strictVariables: ...,
     *   textBody: ...,
     *   updatedAt: ...,
     *   variableSchema: ...,
     *   variables: ...,
     *   variablesMode: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailTemplateCommon)
     *   ->withID(...)
     *   ->withAutoescape(...)
     *   ->withCreatedAt(...)
     *   ->withHTMLBody(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     *   ->withStrictVariables(...)
     *   ->withTextBody(...)
     *   ->withUpdatedAt(...)
     *   ->withVariableSchema(...)
     *   ->withVariables(...)
     *   ->withVariablesMode(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param array<string,VariableSchemaEntry|VariableSchemaEntryShape>|null $variableSchema
     * @param list<string> $variables
     * @param VariablesMode|value-of<VariablesMode> $variablesMode
     */
    public static function with(
        string $id,
        bool $autoescape,
        \DateTimeInterface $createdAt,
        ?string $htmlBody,
        string $name,
        RecordType|string $recordType,
        bool $strictVariables,
        ?string $textBody,
        \DateTimeInterface $updatedAt,
        ?array $variableSchema,
        array $variables,
        VariablesMode|string $variablesMode,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['autoescape'] = $autoescape;
        $self['createdAt'] = $createdAt;
        $self['htmlBody'] = $htmlBody;
        $self['name'] = $name;
        $self['recordType'] = $recordType;
        $self['strictVariables'] = $strictVariables;
        $self['textBody'] = $textBody;
        $self['updatedAt'] = $updatedAt;
        $self['variableSchema'] = $variableSchema;
        $self['variables'] = $variables;
        $self['variablesMode'] = $variablesMode;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Whether HTML autoescaping is enabled for this template. When `true`, only rendered `html_body` expression output is HTML-escaped at the output boundary; `subject` and `text_body` are never autoescaped.
     */
    public function withAutoescape(bool $autoescape): self
    {
        $self = clone $this;
        $self['autoescape'] = $autoescape;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

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
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Whether strict variable validation is enabled for this template. When `true`, sends and renders that are missing a variable marked `required: true` in `variable_schema` fail with 422 naming the variable.
     */
    public function withStrictVariables(bool $strictVariables): self
    {
        $self = clone $this;
        $self['strictVariables'] = $strictVariables;

        return $self;
    }

    public function withTextBody(?string $textBody): self
    {
        $self = clone $this;
        $self['textBody'] = $textBody;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Structured variable requirements, or `null` when the template uses only the legacy `variables` array.
     *
     * @param array<string,VariableSchemaEntry|VariableSchemaEntryShape>|null $variableSchema
     */
    public function withVariableSchema(?array $variableSchema): self
    {
        $self = clone $this;
        $self['variableSchema'] = $variableSchema;

        return $self;
    }

    /**
     * Persisted variable names. In `explicit` mode this array preserves the exact provided order, duplicates, and string contents; in `automatic` mode it is derived from the stored subject and bodies.
     *
     * @param list<string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }

    /**
     * `automatic` when variable names are derived from template content; `explicit` when `variables` is the exact manually managed array.
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
