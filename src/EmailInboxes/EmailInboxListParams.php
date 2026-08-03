<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists the account's non-deleted inboxes newest first using stable cursor pagination.
 *
 * @see Telnyx\Services\EmailInboxesService::list()
 *
 * @phpstan-type EmailInboxListParamsShape = array{
 *   pageCursor?: string|null, pageSize?: int|null
 * }
 */
final class EmailInboxListParams implements BaseModel
{
    /** @use SdkModel<EmailInboxListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Opaque cursor returned by the previous inbox page.
     */
    #[Optional]
    public ?string $pageCursor;

    /**
     * Number of results to return. Defaults to 20; maximum is 250.
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
     * Opaque cursor returned by the previous inbox page.
     */
    public function withPageCursor(string $pageCursor): self
    {
        $self = clone $this;
        $self['pageCursor'] = $pageCursor;

        return $self;
    }

    /**
     * Number of results to return. Defaults to 20; maximum is 250.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
