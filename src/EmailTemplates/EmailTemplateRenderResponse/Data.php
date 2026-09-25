<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates\EmailTemplateRenderResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailTemplates\EmailTemplate\RecordType;
use Telnyx\EmailTemplates\EmailTemplate\VariableSchema;

/**
 * Template object with `subject`, `html_body`, and `text_body` replaced by their Liquid-rendered values. All other template fields (id, name, variables, etc.) remain unchanged.
 *
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplate\VariableSchema
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   autoescape: bool,
 *   createdAt: \DateTimeInterface,
 *   htmlBody: string|null,
 *   name: string,
 *   recordType: RecordType|value-of<RecordType>,
 *   strictVariables: bool,
 *   subject: string|null,
 *   textBody: string|null,
 *   updatedAt: \DateTimeInterface,
 *   variableSchema: array<string,VariableSchema|VariableSchemaShape>|null,
 *   variables: list<string>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
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

    #[Required]
    public ?string $subject;

    #[Required('text_body')]
    public ?string $textBody;

    #[Required('updated_at')]
    public \DateTimeInterface $updatedAt;

    /**
     * Structured variable requirements, or `null` when the template uses only the legacy `variables` array.
     *
     * @var array<string,VariableSchema>|null $variableSchema
     */
    #[Required('variable_schema', map: VariableSchema::class)]
    public ?array $variableSchema;

    /**
     * Legacy unstructured variable names. This path remains supported unchanged.
     *
     * @var list<string> $variables
     */
    #[Required(list: 'string')]
    public array $variables;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   autoescape: ...,
     *   createdAt: ...,
     *   htmlBody: ...,
     *   name: ...,
     *   recordType: ...,
     *   strictVariables: ...,
     *   subject: ...,
     *   textBody: ...,
     *   updatedAt: ...,
     *   variableSchema: ...,
     *   variables: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withAutoescape(...)
     *   ->withCreatedAt(...)
     *   ->withHTMLBody(...)
     *   ->withName(...)
     *   ->withRecordType(...)
     *   ->withStrictVariables(...)
     *   ->withSubject(...)
     *   ->withTextBody(...)
     *   ->withUpdatedAt(...)
     *   ->withVariableSchema(...)
     *   ->withVariables(...)
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
     * @param array<string,VariableSchema|VariableSchemaShape>|null $variableSchema
     * @param list<string> $variables
     */
    public static function with(
        string $id,
        bool $autoescape,
        \DateTimeInterface $createdAt,
        ?string $htmlBody,
        string $name,
        RecordType|string $recordType,
        bool $strictVariables,
        ?string $subject,
        ?string $textBody,
        \DateTimeInterface $updatedAt,
        ?array $variableSchema,
        array $variables,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['autoescape'] = $autoescape;
        $self['createdAt'] = $createdAt;
        $self['htmlBody'] = $htmlBody;
        $self['name'] = $name;
        $self['recordType'] = $recordType;
        $self['strictVariables'] = $strictVariables;
        $self['subject'] = $subject;
        $self['textBody'] = $textBody;
        $self['updatedAt'] = $updatedAt;
        $self['variableSchema'] = $variableSchema;
        $self['variables'] = $variables;

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

    public function withSubject(?string $subject): self
    {
        $self = clone $this;
        $self['subject'] = $subject;

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
     * @param array<string,VariableSchema|VariableSchemaShape>|null $variableSchema
     */
    public function withVariableSchema(?array $variableSchema): self
    {
        $self = clone $this;
        $self['variableSchema'] = $variableSchema;

        return $self;
    }

    /**
     * Legacy unstructured variable names. This path remains supported unchanged.
     *
     * @param list<string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }
}
