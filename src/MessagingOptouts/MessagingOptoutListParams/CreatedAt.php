<?php

declare(strict_types=1);

namespace Telnyx\MessagingOptouts\MessagingOptoutListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte].
 *
 * @phpstan-type CreatedAtShape = array{
 *   gte?: \DateTimeInterface|null, lte?: \DateTimeInterface|null
 * }
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    /**
     * Filter opt-outs created after this date (ISO-8601 format).
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gte;

    /**
     * Filter opt-outs created before this date (ISO-8601 format).
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $lte;

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
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lte = null
    ): self {
        $obj = new self;

        null !== $gte && $obj->gte = $gte;
        null !== $lte && $obj->lte = $lte;

        return $obj;
    }

    /**
     * Filter opt-outs created after this date (ISO-8601 format).
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $obj = clone $this;
        $obj->gte = $gte;

        return $obj;
    }

    /**
     * Filter opt-outs created before this date (ISO-8601 format).
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $obj = clone $this;
        $obj->lte = $lte;

        return $obj;
    }
}
