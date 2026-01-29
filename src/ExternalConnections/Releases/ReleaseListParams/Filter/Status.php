<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListParams\Filter\Status\Eq;

/**
 * @phpstan-type StatusShape = array{eq?: list<Eq|value-of<Eq>>|null}
 */
final class Status implements BaseModel
{
    /** @use SdkModel<StatusShape> */
    use SdkModel;

    /**
     * The status of the release to filter by.
     *
     * @var list<value-of<Eq>>|null $eq
     */
    #[Optional(list: Eq::class)]
    public ?array $eq;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Eq|value-of<Eq>>|null $eq
     */
    public static function with(?array $eq = null): self
    {
        $self = new self;

        null !== $eq && $self['eq'] = $eq;

        return $self;
    }

    /**
     * The status of the release to filter by.
     *
     * @param list<Eq|value-of<Eq>> $eq
     */
    public function withEq(array $eq): self
    {
        $self = clone $this;
        $self['eq'] = $eq;

        return $self;
    }
}
