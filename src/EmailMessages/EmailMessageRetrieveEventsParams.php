<?php

declare(strict_types=1);

namespace Telnyx\EmailMessages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists events for a single message sorted oldest first by `occurred_at asc, id asc`.
 * The legacy `/v2/emails/{id}/events` GET route is a backward-compatible alias.
 *
 * @see Telnyx\Services\EmailMessagesService::retrieveEvents()
 *
 * @phpstan-type EmailMessageRetrieveEventsParamsShape = array{
 *   pageCursor?: string|null, pageSize?: int|null
 * }
 */
final class EmailMessageRetrieveEventsParams implements BaseModel
{
    /** @use SdkModel<EmailMessageRetrieveEventsParamsShape> */
    use SdkModel;
    use SdkParams;

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
        ?string $pageCursor = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        null !== $pageCursor && $self['pageCursor'] = $pageCursor;
        null !== $pageSize && $self['pageSize'] = $pageSize;

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
