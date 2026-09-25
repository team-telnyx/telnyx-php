<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\EmailTemplates\EmailTemplateCreateParams\VariableSchema;

/**
 * Creates a Liquid email template. Variables are auto-extracted when omitted.
 *
 * @see Telnyx\Services\EmailTemplatesService::create()
 *
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplateCreateParams\VariableSchema
 *
 * @phpstan-type EmailTemplateCreateParamsShape = array{
 *   name: string,
 *   autoescape?: bool|null,
 *   htmlBody?: string|null,
 *   strictVariables?: bool|null,
 *   subject?: string|null,
 *   textBody?: string|null,
 *   variableSchema?: array<string,VariableSchema|VariableSchemaShape>|null,
 *   variables?: list<string>|null,
 *   idempotencyKey?: string|null,
 * }
 */
final class EmailTemplateCreateParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Letters, numbers, spaces, hyphens, and underscores only.
     */
    #[Required]
    public string $name;

    /**
     * Per-template HTML autoescaping setting. Defaults to `false` for backward compatibility. When `true`, the rendered `html_body` HTML-escapes each Liquid expression's output at the output boundary (after its filters run, before concatenation with literal template markup). Input values are never mutated and `subject`/`text_body` are never autoescaped. The boundary escape is idempotent: HTML entities already present in the output (e.g. from an explicit `escape` filter) are preserved, so an explicit `escape`/`escape_once` is never double-escaped, and markup introduced by any later filter in the chain is still escaped.
     */
    #[Optional]
    public ?bool $autoescape;

    /**
     * Liquid template HTML body.
     */
    #[Optional('html_body', nullable: true)]
    public ?string $htmlBody;

    /**
     * Per-template strict variable-validation setting. Defaults to `false` for backward compatibility. When `true`, a send or render that is missing a variable marked `required: true` in `variable_schema` fails with 422 naming the variable. Missing optional variables never fail; their schema `default` (when set) is applied to the render.
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
     * Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. This is independent of the legacy `variables` array. On render with `strict_variables` enabled: `required` variables must be supplied as non-empty values — absent, `null`, empty string, empty object `{}`, and empty array `[]` all fail with 422 naming the variable, while present values such as `false` and `0` pass (they are present, not empty). Optional variables fall back to their `default` when absent.
     *
     * @var array<string,VariableSchema>|null $variableSchema
     */
    #[Optional('variable_schema', map: VariableSchema::class, nullable: true)]
    public ?array $variableSchema;

    /**
     * Template variables. Auto-extracted from subject/body fields when absent.
     *
     * @var list<string>|null $variables
     */
    #[Optional(list: 'string')]
    public ?array $variables;

    #[Optional]
    public ?string $idempotencyKey;

    /**
     * `new EmailTemplateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailTemplateCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailTemplateCreateParams)->withName(...)
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
     * @param Omitted|array<string,VariableSchema|VariableSchemaShape>|null $variableSchema
     * @param list<string>|null $variables
     */
    public static function with(
        string $name,
        string|Omitted|null $htmlBody = Omitted::VALUE,
        string|Omitted|null $subject = Omitted::VALUE,
        string|Omitted|null $textBody = Omitted::VALUE,
        Omitted|array|null $variableSchema = Omitted::VALUE,
        ?bool $autoescape = null,
        ?bool $strictVariables = null,
        ?array $variables = null,
        ?string $idempotencyKey = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $autoescape && $self['autoescape'] = $autoescape;
        Omitted::VALUE !== $htmlBody && $self['htmlBody'] = $htmlBody;
        null !== $strictVariables && $self['strictVariables'] = $strictVariables;
        Omitted::VALUE !== $subject && $self['subject'] = $subject;
        Omitted::VALUE !== $textBody && $self['textBody'] = $textBody;
        Omitted::VALUE !== $variableSchema && $self['variableSchema'] = $variableSchema;
        null !== $variables && $self['variables'] = $variables;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    /**
     * Letters, numbers, spaces, hyphens, and underscores only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Per-template HTML autoescaping setting. Defaults to `false` for backward compatibility. When `true`, the rendered `html_body` HTML-escapes each Liquid expression's output at the output boundary (after its filters run, before concatenation with literal template markup). Input values are never mutated and `subject`/`text_body` are never autoescaped. The boundary escape is idempotent: HTML entities already present in the output (e.g. from an explicit `escape` filter) are preserved, so an explicit `escape`/`escape_once` is never double-escaped, and markup introduced by any later filter in the chain is still escaped.
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

    /**
     * Per-template strict variable-validation setting. Defaults to `false` for backward compatibility. When `true`, a send or render that is missing a variable marked `required: true` in `variable_schema` fails with 422 naming the variable. Missing optional variables never fail; their schema `default` (when set) is applied to the render.
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
     * Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. This is independent of the legacy `variables` array. On render with `strict_variables` enabled: `required` variables must be supplied as non-empty values — absent, `null`, empty string, empty object `{}`, and empty array `[]` all fail with 422 naming the variable, while present values such as `false` and `0` pass (they are present, not empty). Optional variables fall back to their `default` when absent.
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
     * Template variables. Auto-extracted from subject/body fields when absent.
     *
     * @param list<string> $variables
     */
    public function withVariables(array $variables): self
    {
        $self = clone $this;
        $self['variables'] = $variables;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
