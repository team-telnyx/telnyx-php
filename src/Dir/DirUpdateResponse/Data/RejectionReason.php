<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirUpdateResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RejectionReasonShape = array{
 *   code?: string|null,
 *   detail?: string|null,
 *   message?: string|null,
 *   title?: string|null,
 * }
 */
final class RejectionReason implements BaseModel
{
    /** @use SdkModel<RejectionReasonShape> */
    use SdkModel;

    #[Optional]
    public ?string $code;

    #[Optional]
    public ?string $detail;

    /**
     * Customer-visible free-text comment from the Telnyx vetting team. Only the first entry of `rejection_reasons` carries this; the rest are `null`.
     */
    #[Optional(nullable: true)]
    public ?string $message;

    #[Optional]
    public ?string $title;

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
        ?string $code = null,
        ?string $detail = null,
        ?string $message = null,
        ?string $title = null,
    ): self {
        $self = new self;

        null !== $code && $self['code'] = $code;
        null !== $detail && $self['detail'] = $detail;
        null !== $message && $self['message'] = $message;
        null !== $title && $self['title'] = $title;

        return $self;
    }

    public function withCode(string $code): self
    {
        $self = clone $this;
        $self['code'] = $code;

        return $self;
    }

    public function withDetail(string $detail): self
    {
        $self = clone $this;
        $self['detail'] = $detail;

        return $self;
    }

    /**
     * Customer-visible free-text comment from the Telnyx vetting team. Only the first entry of `rejection_reasons` carries this; the rest are `null`.
     */
    public function withMessage(?string $message): self
    {
        $self = clone $this;
        $self['message'] = $message;

        return $self;
    }

    public function withTitle(string $title): self
    {
        $self = clone $this;
        $self['title'] = $title;

        return $self;
    }
}
