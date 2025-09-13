<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Date range filtering operations for fax creation timestamp.
 *
 * @phpstan-type created_at = array{
 *   gt?: \DateTimeInterface,
 *   gte?: \DateTimeInterface,
 *   lt?: \DateTimeInterface,
 *   lte?: \DateTimeInterface,
 * }
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<created_at> */
    use SdkModel;

    /**
     * ISO 8601 date time for filtering faxes created after that date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gt;

    /**
     * ISO 8601 date time for filtering faxes created after or on that date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $gte;

    /**
     * ISO 8601 formatted date time for filtering faxes created before that date.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $lt;

    /**
     * ISO 8601 formatted date time for filtering faxes created on or before that date.
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
        ?\DateTimeInterface $gt = null,
        ?\DateTimeInterface $gte = null,
        ?\DateTimeInterface $lt = null,
        ?\DateTimeInterface $lte = null,
    ): self {
        $obj = new self;

        null !== $gt && $obj->gt = $gt;
        null !== $gte && $obj->gte = $gte;
        null !== $lt && $obj->lt = $lt;
        null !== $lte && $obj->lte = $lte;

        return $obj;
    }

    /**
     * ISO 8601 date time for filtering faxes created after that date.
     */
    public function withGt(\DateTimeInterface $gt): self
    {
        $obj = clone $this;
        $obj->gt = $gt;

        return $obj;
    }

    /**
     * ISO 8601 date time for filtering faxes created after or on that date.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $obj = clone $this;
        $obj->gte = $gte;

        return $obj;
    }

    /**
     * ISO 8601 formatted date time for filtering faxes created before that date.
     */
    public function withLt(\DateTimeInterface $lt): self
    {
        $obj = clone $this;
        $obj->lt = $lt;

        return $obj;
    }

    /**
     * ISO 8601 formatted date time for filtering faxes created on or before that date.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $obj = clone $this;
        $obj->lte = $lte;

        return $obj;
    }
}
