<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type PortingOrderUserFeedbackShape = array{
 *   userComment?: string|null, userRating?: int|null
 * }
 */
final class PortingOrderUserFeedback implements BaseModel
{
    /** @use SdkModel<PortingOrderUserFeedbackShape> */
    use SdkModel;

    /**
     * A comment related to the customer rating.
     */
    #[Optional('user_comment', nullable: true)]
    public ?string $userComment;

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    #[Optional('user_rating', nullable: true)]
    public ?int $userRating;

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
        string|Omitted|null $userComment = Omitted::VALUE,
        int|Omitted|null $userRating = Omitted::VALUE,
    ): self {
        $self = new self;

        Omitted::VALUE !== $userComment && $self['userComment'] = $userComment;
        Omitted::VALUE !== $userRating && $self['userRating'] = $userRating;

        return $self;
    }

    /**
     * A comment related to the customer rating.
     */
    public function withUserComment(?string $userComment): self
    {
        $self = clone $this;
        $self['userComment'] = $userComment;

        return $self;
    }

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    public function withUserRating(?int $userRating): self
    {
        $self = clone $this;
        $self['userRating'] = $userRating;

        return $self;
    }
}
