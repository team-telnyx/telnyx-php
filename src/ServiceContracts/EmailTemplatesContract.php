<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailTemplates\EmailTemplate;
use Telnyx\EmailTemplates\EmailTemplateCreateParams\VariableSchema;
use Telnyx\EmailTemplates\EmailTemplateRenderResponse;
use Telnyx\EmailTemplates\EmailTemplateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplateCreateParams\VariableSchema
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariableSchema as VariableSchemaShape1
 * @phpstan-import-type VariableSchemaShape from \Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariableSchema as VariableSchemaShape2
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailTemplatesContract
{
    /**
     * @api
     *
     * @param string $name body param: Letters, numbers, spaces, hyphens, and underscores only
     * @param bool $autoescape Body param: Per-template HTML autoescaping setting. Defaults to `false` for backward compatibility. When `true`, the rendered `html_body` HTML-escapes each Liquid expression's output at the output boundary (after its filters run, before concatenation with literal template markup). Input values are never mutated and `subject`/`text_body` are never autoescaped. The boundary escape is idempotent: HTML entities already present in the output (e.g. from an explicit `escape` filter) are preserved, so an explicit `escape`/`escape_once` is never double-escaped, and markup introduced by any later filter in the chain is still escaped.
     * @param string|Omitted|null $htmlBody body param: Liquid template HTML body
     * @param bool $strictVariables Body param: Per-template strict variable-validation setting. Defaults to `false` for backward compatibility. When `true`, a send or render that is missing a variable marked `required: true` in `variable_schema` fails with 422 naming the variable. Missing optional variables never fail; their schema `default` (when set) is applied to the render.
     * @param string|Omitted|null $subject body param: Liquid template subject
     * @param string|Omitted|null $textBody body param: Liquid template text body
     * @param Omitted|array<string,VariableSchema|VariableSchemaShape>|null $variableSchema Body param: Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. This is independent of the legacy `variables` array. On render with `strict_variables` enabled: `required` variables must be supplied as non-empty values — absent, `null`, empty string, empty object `{}`, and empty array `[]` all fail with 422 naming the variable, while present values such as `false` and `0` pass (they are present, not empty). Optional variables fall back to their `default` when absent.
     * @param list<string> $variables Body param: Template variables. Auto-extracted from subject/body fields when absent.
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        bool $autoescape = false,
        string|Omitted|null $htmlBody = Omitted::VALUE,
        bool $strictVariables = false,
        string|Omitted|null $subject = Omitted::VALUE,
        string|Omitted|null $textBody = Omitted::VALUE,
        Omitted|array|null $variableSchema = Omitted::VALUE,
        ?array $variables = null,
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): EmailTemplateResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param bool $autoescape per-template HTML autoescaping setting
     * @param string|Omitted|null $htmlBody liquid template HTML body
     * @param bool $strictVariables per-template strict variable-validation setting
     * @param string|Omitted|null $subject liquid template subject
     * @param string|Omitted|null $textBody liquid template text body
     * @param Omitted|array<string,\Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariableSchema|VariableSchemaShape1>|null $variableSchema Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. Set to `null` to clear the schema.
     * @param list<string> $variables
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?bool $autoescape = null,
        string|Omitted|null $htmlBody = Omitted::VALUE,
        ?string $name = null,
        ?bool $strictVariables = null,
        string|Omitted|null $subject = Omitted::VALUE,
        string|Omitted|null $textBody = Omitted::VALUE,
        Omitted|array|null $variableSchema = Omitted::VALUE,
        ?array $variables = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse;

    /**
     * @api
     *
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailCursorPagination<EmailTemplate>
     *
     * @throws APIException
     */
    public function list(
        ?string $pageCursor = null,
        int $pageSize = 25,
        RequestOptions|array|null $requestOptions = null,
    ): EmailCursorPagination;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param array<string,mixed> $templateVariables Variables for Liquid template rendering. Non-object values are silently treated as an empty object.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function render(
        string $id,
        array $templateVariables = [],
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateRenderResponse;

    /**
     * @api
     *
     * @param string $id email template UUID
     * @param bool $autoescape per-template HTML autoescaping setting
     * @param string|Omitted|null $htmlBody liquid template HTML body
     * @param bool $strictVariables per-template strict variable-validation setting
     * @param string|Omitted|null $subject liquid template subject
     * @param string|Omitted|null $textBody liquid template text body
     * @param Omitted|array<string,\Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariableSchema|VariableSchemaShape2>|null $variableSchema Structured variable requirements. Required variables cannot define defaults; invalid combinations return 422. Set to `null` to clear the schema.
     * @param list<string> $variables
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function replace(
        string $id,
        ?bool $autoescape = null,
        string|Omitted|null $htmlBody = Omitted::VALUE,
        ?string $name = null,
        ?bool $strictVariables = null,
        string|Omitted|null $subject = Omitted::VALUE,
        string|Omitted|null $textBody = Omitted::VALUE,
        Omitted|array|null $variableSchema = Omitted::VALUE,
        ?array $variables = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse;
}
