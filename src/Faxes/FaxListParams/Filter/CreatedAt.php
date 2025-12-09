<?php

declare(strict_types=1);

namespace Telnyx\Faxes\FaxListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Date range filtering operations for fax creation timestamp.
 *
 * @phpstan-type CreatedAtShape = array{
 *   gt?: \DateTimeInterface|null,
 *   gte?: \DateTimeInterface|null,
 *   lt?: \DateTimeInterface|null,
 *   lte?: \DateTimeInterface|null,
 * }
 */
final class CreatedAt implements BaseModel
{
    /** @use SdkModel<CreatedAtShape> */
    use SdkModel;

    /**
     * ISO 8601 date time for filtering faxes created after that date.
     */
    #[Optional]
    public ?\DateTimeInterface $gt;

    /**
     * ISO 8601 date time for filtering faxes created after or on that date.
     */
    #[Optional]
    public ?\DateTimeInterface $gte;

    /**
     * ISO 8601 formatted date time for filtering faxes created before that date.
     */
    #[Optional]
    public ?\DateTimeInterface $lt;

    /**
     * ISO 8601 formatted date time for filtering faxes created on or before that date.
     */
    #[Optional]
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
        $self = new self;

        null !== $gt && $self['gt'] = $gt;
        null !== $gte && $self['gte'] = $gte;
        null !== $lt && $self['lt'] = $lt;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * ISO 8601 date time for filtering faxes created after that date.
     */
    public function withGt(\DateTimeInterface $gt): self
    {
        $self = clone $this;
        $self['gt'] = $gt;

        return $self;
    }

    /**
     * ISO 8601 date time for filtering faxes created after or on that date.
     */
    public function withGte(\DateTimeInterface $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * ISO 8601 formatted date time for filtering faxes created before that date.
     */
    public function withLt(\DateTimeInterface $lt): self
    {
        $self = clone $this;
        $self['lt'] = $lt;

        return $self;
    }

    /**
     * ISO 8601 formatted date time for filtering faxes created on or before that date.
     */
    public function withLte(\DateTimeInterface $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
