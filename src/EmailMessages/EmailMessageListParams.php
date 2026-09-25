<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists messages sorted newest first by `created_at desc, id desc`. Tags and metadata filters compose with cursor pagination. The legacy `/v2/emails` GET route is a backward-compatible alias for this operation.
 *
 * @see Telnyx\Services\EmailMessagesService::list()
 *
 * @phpstan-type EmailMessageListParamsShape = array{
 *   filterMetadata?: string|null,
 *   filterTags?: string|null,
 *   pageCursor?: string|null,
 *   pageSize?: int|null,
 * }
 */
final class EmailMessageListParams implements BaseModel
{
    /** @use SdkModel<EmailMessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Metadata containment filter, supplied as a JSON object or comma-separated `key=value` pairs. All supplied key/value pairs must be contained in the message metadata. An empty value or empty JSON object omits the filter. Malformed values, valid non-object JSON, pairs without `=`, empty keys, and non-string/nested query shapes return HTTP 400.
     */
    #[Optional]
    public ?string $filterMetadata;

    /**
     * Comma-separated tags. Each segment is trimmed, and messages having at least one supplied tag are returned; matching is exact and case-sensitive after trimming. Because commas delimit values and surrounding whitespace is removed, this filter cannot represent stored tags containing literal commas or leading/trailing whitespace. An empty value omits the filter. Empty segments and non-string/nested query shapes return HTTP 400.
     */
    #[Optional]
    public ?string $filterTags;

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
     */
    public static function with(
        ?string $filterMetadata = null,
        ?string $filterTags = null,
        ?string $pageCursor = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterMetadata && $self['filterMetadata'] = $filterMetadata;
        null !== $filterTags && $self['filterTags'] = $filterTags;
        null !== $pageCursor && $self['pageCursor'] = $pageCursor;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Metadata containment filter, supplied as a JSON object or comma-separated `key=value` pairs. All supplied key/value pairs must be contained in the message metadata. An empty value or empty JSON object omits the filter. Malformed values, valid non-object JSON, pairs without `=`, empty keys, and non-string/nested query shapes return HTTP 400.
     */
    public function withFilterMetadata(string $filterMetadata): self
    {
        $self = clone $this;
        $self['filterMetadata'] = $filterMetadata;

        return $self;
    }

    /**
     * Comma-separated tags. Each segment is trimmed, and messages having at least one supplied tag are returned; matching is exact and case-sensitive after trimming. Because commas delimit values and surrounding whitespace is removed, this filter cannot represent stored tags containing literal commas or leading/trailing whitespace. An empty value omits the filter. Empty segments and non-string/nested query shapes return HTTP 400.
     */
    public function withFilterTags(string $filterTags): self
    {
        $self = clone $this;
        $self['filterTags'] = $filterTags;

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
