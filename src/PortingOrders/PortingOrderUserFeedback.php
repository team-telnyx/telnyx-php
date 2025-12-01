<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderUserFeedbackShape = array{
 *   user_comment?: string|null, user_rating?: int|null
 * }
 */
final class PortingOrderUserFeedback implements BaseModel
{
    /** @use SdkModel<PortingOrderUserFeedbackShape> */
    use SdkModel;

    /**
     * A comment related to the customer rating.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $user_comment;

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    #[Api(nullable: true, optional: true)]
    public ?int $user_rating;

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
        ?string $user_comment = null,
        ?int $user_rating = null
    ): self {
        $obj = new self;

        null !== $user_comment && $obj->user_comment = $user_comment;
        null !== $user_rating && $obj->user_rating = $user_rating;

        return $obj;
    }

    /**
     * A comment related to the customer rating.
     */
    public function withUserComment(?string $userComment): self
    {
        $obj = clone $this;
        $obj->user_comment = $userComment;

        return $obj;
    }

    /**
     * Once an order is ported, cancellation is requested or the request is cancelled, the user may rate their experience.
     */
    public function withUserRating(?int $userRating): self
    {
        $obj = clone $this;
        $obj->user_rating = $userRating;

        return $obj;
    }
}
