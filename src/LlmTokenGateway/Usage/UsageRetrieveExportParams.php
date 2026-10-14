<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Durable, replayable, content-free usage export for customer pipelines. Requires the dedicated llm_token_gateway.usage_export.read V2 action; spend.read and usage.read do not grant it. Records are inference.request (one per immutable ledger revision; a correction adds a new id with supersedes, keep the highest revision per request_id) and guardrail.evaluation (one per guardrail event, including blocked prompts with no inference record; correlate on request_id). Delivery is at least once in commit order: deduplicate on id. Records appear after settlement and after every older database transaction has finished (meta.horizon_lag_seconds); keep polling with next_cursor, which is always returned and is reusable after has_more is false. After a logical database restore, restart from start_time and deduplicate on id; a cursor from before it may return 409 cursor_expired (no Retry-After). Retention promise 30 days. No prompts, responses, provider credentials, supplier or customer rates. Gateway reference/enforcement usage, not invoice truth or BYOK provider charges.
 *
 * @see Telnyx\Services\LlmTokenGateway\UsageService::retrieveExport()
 *
 * @phpstan-type UsageRetrieveExportParamsShape = array{
 *   cursor?: string|null,
 *   limit?: int|null,
 *   startTime?: \DateTimeInterface|null,
 *   types?: string|null,
 * }
 */
final class UsageRetrieveExportParams implements BaseModel
{
    /** @use SdkModel<UsageRetrieveExportParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Opaque next_cursor from a previous page; not combinable with start_time. Bound to the requested types; the account always comes from the credential.
     */
    #[Optional]
    public ?string $cursor;

    #[Optional]
    public ?int $limit;

    /**
     * First page only: RFC 3339 with offset, at most 30 days ago and not in the future; default now - 24h.
     */
    #[Optional]
    public ?\DateTimeInterface $startTime;

    /**
     * Comma-separated subset of inference.request,guardrail.evaluation; default both.
     */
    #[Optional]
    public ?string $types;

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
        ?string $cursor = null,
        ?int $limit = null,
        ?\DateTimeInterface $startTime = null,
        ?string $types = null,
    ): self {
        $self = new self;

        null !== $cursor && $self['cursor'] = $cursor;
        null !== $limit && $self['limit'] = $limit;
        null !== $startTime && $self['startTime'] = $startTime;
        null !== $types && $self['types'] = $types;

        return $self;
    }

    /**
     * Opaque next_cursor from a previous page; not combinable with start_time. Bound to the requested types; the account always comes from the credential.
     */
    public function withCursor(string $cursor): self
    {
        $self = clone $this;
        $self['cursor'] = $cursor;

        return $self;
    }

    public function withLimit(int $limit): self
    {
        $self = clone $this;
        $self['limit'] = $limit;

        return $self;
    }

    /**
     * First page only: RFC 3339 with offset, at most 30 days ago and not in the future; default now - 24h.
     */
    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $self = clone $this;
        $self['startTime'] = $startTime;

        return $self;
    }

    /**
     * Comma-separated subset of inference.request,guardrail.evaluation; default both.
     */
    public function withTypes(string $types): self
    {
        $self = clone $this;
        $self['types'] = $types;

        return $self;
    }
}
