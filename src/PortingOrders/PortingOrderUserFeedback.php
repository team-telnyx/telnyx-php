<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

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
        ?string $userComment = null,
        ?int $userRating = null
    ): self {
        $obj = new self;

        null !== $userComment && $obj['userComment'] = $userComment;
        null !== $userRating && $obj['userRating'] = $userRating;

        return $obj;
    }

    /**
     * A comment related to the customer rating.
     */
    public function withUserComment(?string $userComment): self
    {
        $obj = clone $this;
        $obj['userComment'] = $userComment;

        return $obj;
    }

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    public function withUserRating(?int $userRating): self
    {
        $obj = clone $this;
        $obj['userRating'] = $userRating;

        return $obj;
    }
}
