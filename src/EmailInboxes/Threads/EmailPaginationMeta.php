<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Threads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmailPaginationMetaShape = array{
 *   pageSize: int, pageCursor?: string|null
 * }
 */
final class EmailPaginationMeta implements BaseModel
{
    /** @use SdkModel<EmailPaginationMetaShape> */
    use SdkModel;

    #[Required('page_size')]
    public int $pageSize;

    /**
     * Cursor for the next page, when more results are available.
     */
    #[Optional('page_cursor')]
    public ?string $pageCursor;

    /**
     * `new EmailPaginationMeta()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailPaginationMeta::with(pageSize: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailPaginationMeta)->withPageSize(...)
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
     */
    public static function with(int $pageSize, ?string $pageCursor = null): self
    {
        $self = new self;

        $self['pageSize'] = $pageSize;

        null !== $pageCursor && $self['pageCursor'] = $pageCursor;

        return $self;
    }

    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Cursor for the next page, when more results are available.
     */
    public function withPageCursor(string $pageCursor): self
    {
        $self = clone $this;
        $self['pageCursor'] = $pageCursor;

        return $self;
    }
}
