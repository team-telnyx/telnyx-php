<?php

declare(strict_types=1);

namespace Telnyx\EmailTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailTemplates\EmailTemplateListParams\FilterAutoescape;
use Telnyx\EmailTemplates\EmailTemplateListParams\FilterContentType;
use Telnyx\EmailTemplates\EmailTemplateListParams\FilterStrictVariables;

/**
 * Lists templates sorted newest first by `created_at desc, id desc`. Optional filters match a case-insensitive literal name/subject query, stored body presence, and the `strict_variables` and `autoescape` settings. Filters intersect, remain scoped to the authenticated account, and apply before cursor pagination. Invalid filter names or values return 400.
 *
 * @see Telnyx\Services\EmailTemplatesService::list()
 *
 * @phpstan-type EmailTemplateListParamsShape = array{
 *   filterAutoescape?: null|FilterAutoescape|value-of<FilterAutoescape>,
 *   filterContentType?: null|FilterContentType|value-of<FilterContentType>,
 *   filterQuery?: string|null,
 *   filterStrictVariables?: null|FilterStrictVariables|value-of<FilterStrictVariables>,
 *   pageCursor?: string|null,
 *   pageSize?: int|null,
 * }
 */
final class EmailTemplateListParams implements BaseModel
{
    /** @use SdkModel<EmailTemplateListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Exact match on the template's `autoescape` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
     *
     * @var value-of<FilterAutoescape>|null $filterAutoescape
     */
    #[Optional(enum: FilterAutoescape::class)]
    public ?string $filterAutoescape;

    /**
     * Matches templates by stored body presence. `html_and_text` requires both an HTML and text body; `html_only` requires HTML and no text body; `text_only` requires text and no HTML body; `no_body` requires neither. `null` and exactly `""` count as absent; whitespace-only strings count as content. An empty or unsupported value returns a 400 response.
     *
     * @var value-of<FilterContentType>|null $filterContentType
     */
    #[Optional(enum: FilterContentType::class)]
    public ?string $filterContentType;

    /**
     * Case-insensitive literal substring match over the template `name` or stored `subject` only; bodies are never searched. `%`, `_`, and `\` are literal characters with no wildcard meaning. A blank value is treated as omitted.
     */
    #[Optional]
    public ?string $filterQuery;

    /**
     * Exact match on the template's `strict_variables` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
     *
     * @var value-of<FilterStrictVariables>|null $filterStrictVariables
     */
    #[Optional(enum: FilterStrictVariables::class)]
    public ?string $filterStrictVariables;

    /**
     * Opaque URL-safe Base64 cursor returned by a previous list response.
     */
    #[Optional]
    public ?string $pageCursor;

    /**
     * Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param FilterAutoescape|value-of<FilterAutoescape>|null $filterAutoescape
     * @param FilterContentType|value-of<FilterContentType>|null $filterContentType
     * @param FilterStrictVariables|value-of<FilterStrictVariables>|null $filterStrictVariables
     */
    public static function with(
        FilterAutoescape|string|null $filterAutoescape = null,
        FilterContentType|string|null $filterContentType = null,
        ?string $filterQuery = null,
        FilterStrictVariables|string|null $filterStrictVariables = null,
        ?string $pageCursor = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterAutoescape && $self['filterAutoescape'] = $filterAutoescape;
        null !== $filterContentType && $self['filterContentType'] = $filterContentType;
        null !== $filterQuery && $self['filterQuery'] = $filterQuery;
        null !== $filterStrictVariables && $self['filterStrictVariables'] = $filterStrictVariables;
        null !== $pageCursor && $self['pageCursor'] = $pageCursor;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Exact match on the template's `autoescape` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
     *
     * @param FilterAutoescape|value-of<FilterAutoescape> $filterAutoescape
     */
    public function withFilterAutoescape(
        FilterAutoescape|string $filterAutoescape
    ): self {
        $self = clone $this;
        $self['filterAutoescape'] = $filterAutoescape;

        return $self;
    }

    /**
     * Matches templates by stored body presence. `html_and_text` requires both an HTML and text body; `html_only` requires HTML and no text body; `text_only` requires text and no HTML body; `no_body` requires neither. `null` and exactly `""` count as absent; whitespace-only strings count as content. An empty or unsupported value returns a 400 response.
     *
     * @param FilterContentType|value-of<FilterContentType> $filterContentType
     */
    public function withFilterContentType(
        FilterContentType|string $filterContentType
    ): self {
        $self = clone $this;
        $self['filterContentType'] = $filterContentType;

        return $self;
    }

    /**
     * Case-insensitive literal substring match over the template `name` or stored `subject` only; bodies are never searched. `%`, `_`, and `\` are literal characters with no wildcard meaning. A blank value is treated as omitted.
     */
    public function withFilterQuery(string $filterQuery): self
    {
        $self = clone $this;
        $self['filterQuery'] = $filterQuery;

        return $self;
    }

    /**
     * Exact match on the template's `strict_variables` option. Only the exact query strings `true` and `false` are accepted; other values, including blank, return 400.
     *
     * @param FilterStrictVariables|value-of<FilterStrictVariables> $filterStrictVariables
     */
    public function withFilterStrictVariables(
        FilterStrictVariables|string $filterStrictVariables
    ): self {
        $self = clone $this;
        $self['filterStrictVariables'] = $filterStrictVariables;

        return $self;
    }

    /**
     * Opaque URL-safe Base64 cursor returned by a previous list response.
     */
    public function withPageCursor(string $pageCursor): self
    {
        $self = clone $this;
        $self['pageCursor'] = $pageCursor;

        return $self;
    }

    /**
     * Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
