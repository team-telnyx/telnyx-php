<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type porting_order_user_feedback = array{
 *   userComment?: string|null, userRating?: int|null
 * }
 */
final class PortingOrderUserFeedback implements BaseModel
{
    /** @use SdkModel<porting_order_user_feedback> */
    use SdkModel;

    /**
     * A comment related to the customer rating.
     */
    #[Api('user_comment', optional: true)]
    public ?string $userComment;

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    #[Api('user_rating', optional: true)]
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

        null !== $userComment && $obj->userComment = $userComment;
        null !== $userRating && $obj->userRating = $userRating;

        return $obj;
    }

    /**
     * A comment related to the customer rating.
     */
    public function withUserComment(string $userComment): self
    {
        $obj = clone $this;
        $obj->userComment = $userComment;

        return $obj;
    }

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    public function withUserRating(int $userRating): self
    {
        $obj = clone $this;
        $obj->userRating = $userRating;

        return $obj;
    }
}
