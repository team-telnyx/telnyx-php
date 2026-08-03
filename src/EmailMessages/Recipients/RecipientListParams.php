<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages\Recipients;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Kind;
use Telnyx\EmailMessages\Recipients\RecipientListParams\Status;

/**
 * Lists per-recipient delivery states for a single message with cursor pagination.
 * Each recipient has an independent status, billable flag, and lifecycle timestamps.
 * BCC recipient addresses are redacted (returned as null) to protect BCC privacy.
 * Default page size is 25, maximum is 100.
 *
 * @see Telnyx\Services\EmailMessages\RecipientsService::list()
 *
 * @phpstan-type RecipientListParamsShape = array{
 *   kind?: null|Kind|value-of<Kind>,
 *   pageCursor?: string|null,
 *   pageSize?: int|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class RecipientListParams implements BaseModel
{
    /** @use SdkModel<RecipientListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter recipients by address kind.
     *
     * @var value-of<Kind>|null $kind
     */
    #[Optional(enum: Kind::class)]
    public ?string $kind;

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

    /**
     * Filter recipients by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Kind|value-of<Kind>|null $kind
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        Kind|string|null $kind = null,
        ?string $pageCursor = null,
        ?int $pageSize = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $kind && $self['kind'] = $kind;
        null !== $pageCursor && $self['pageCursor'] = $pageCursor;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Filter recipients by address kind.
     *
     * @param Kind|value-of<Kind> $kind
     */
    public function withKind(Kind|string $kind): self
    {
        $self = clone $this;
        $self['kind'] = $kind;

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

    /**
     * Filter recipients by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
