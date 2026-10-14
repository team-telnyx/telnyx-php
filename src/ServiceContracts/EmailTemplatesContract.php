<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\EmailCursorPagination;
use Telnyx\EmailTemplates\EmailTemplate;
use Telnyx\EmailTemplates\EmailTemplateCreateParams\VariableSchema;
use Telnyx\EmailTemplates\EmailTemplateCreateParams\VariablesMode;
use Telnyx\EmailTemplates\EmailTemplateListParams\FilterAutoescape;
use Telnyx\EmailTemplates\EmailTemplateListParams\FilterContentType;
use Telnyx\EmailTemplates\EmailTemplateListParams\FilterStrictVariables;
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
     * @param list<string>|Omitted|null $variables Body param: Persisted variable names. In `automatic` mode a non-null array is rejected; in `explicit` mode this is the exact manual array and each item is limited to 255 Unicode code points.
     * @param VariablesMode|value-of<VariablesMode> $variablesMode Body param: Controls how `variables` is maintained. If both fields are omitted (or `variables` is null), the template uses `automatic` mode and extracts variable names from the effective subject, HTML body, and text body. A non-null `variables` array with no mode selects `explicit`. `automatic` rejects a simultaneous non-null array; `explicit` requires a non-null array, including valid `[]`, and preserves its exact order, duplicates, and string contents.
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
        array|Omitted|null $variables = Omitted::VALUE,
        VariablesMode|string|null $variablesMode = null,
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
     * @param list<string>|Omitted|null $variables Persisted variable names. In `automatic` mode a non-null array is rejected; in `explicit` mode this is the exact manual array and each item is limited to 255 Unicode code points.
     * @param \Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariablesMode|value-of<\Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariablesMode> $variablesMode Controls how `variables` is maintained. Setting `automatic` re-extracts immediately from the effective subject, HTML body, and text body and rejects a simultaneous non-null array. Setting `explicit` requires the exact non-null array, including valid `[]`. With the mode omitted, a non-null array selects explicit mode, null selects automatic mode, and omitting both fields preserves the current mode. Source-content changes re-extract only in automatic mode.
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
        array|Omitted|null $variables = Omitted::VALUE,
        \Telnyx\EmailTemplates\EmailTemplateUpdateParams\VariablesMode|string|null $variablesMode = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse;

    /**
     * @api
     *
     * @param FilterAutoescape|value-of<FilterAutoescape> $filterAutoescape Exact match on the template's `autoescape` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
     * @param FilterContentType|value-of<FilterContentType> $filterContentType Matches templates by stored body presence. `html_and_text` requires both an HTML and text body; `html_only` requires HTML and no text body; `text_only` requires text and no HTML body; `no_body` requires neither. `null` and exactly `""` count as absent; whitespace-only strings count as content. An empty or unsupported value returns a 400 response.
     * @param string $filterQuery Case-insensitive literal substring match over the template `name` or stored `subject` only; bodies are never searched. `%`, `_`, and `\` are literal characters with no wildcard meaning. A blank value is treated as omitted.
     * @param FilterStrictVariables|value-of<FilterStrictVariables> $filterStrictVariables Exact match on the template's `strict_variables` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
     * @param string $pageCursor opaque URL-safe Base64 cursor returned by a previous list response
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param RequestOpts|null $requestOptions
     *
     * @return EmailCursorPagination<EmailTemplate>
     *
     * @throws APIException
     */
    public function list(
        FilterAutoescape|string|null $filterAutoescape = null,
        FilterContentType|string|null $filterContentType = null,
        ?string $filterQuery = null,
        FilterStrictVariables|string|null $filterStrictVariables = null,
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
     * @param list<string>|Omitted|null $variables Persisted variable names. In `automatic` mode a non-null array is rejected; in `explicit` mode this is the exact manual array and each item is limited to 255 Unicode code points.
     * @param \Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariablesMode|value-of<\Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariablesMode> $variablesMode Controls how `variables` is maintained. Setting `automatic` re-extracts immediately from the effective subject, HTML body, and text body and rejects a simultaneous non-null array. Setting `explicit` requires the exact non-null array, including valid `[]`. With the mode omitted, a non-null array selects explicit mode, null selects automatic mode, and omitting both fields preserves the current mode. Source-content changes re-extract only in automatic mode.
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
        array|Omitted|null $variables = Omitted::VALUE,
        \Telnyx\EmailTemplates\EmailTemplateReplaceParams\VariablesMode|string|null $variablesMode = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailTemplateResponse;
}
