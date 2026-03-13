<?php

declare(strict_types=1);

namespace Telnyx\Recordings\RecordingListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StartTimeShape = array{gte?: string|null, lte?: string|null}
 */
final class StartTime implements BaseModel
{
    /** @use SdkModel<StartTimeShape> */
    use SdkModel;

    /**
     * Returns only recordings with a start time later than or equal to the given ISO 8601 datetime.
     */
    #[Optional]
    public ?string $gte;

    /**
     * Returns only recordings with a start time earlier than or equal to the given ISO 8601 datetime.
     */
    #[Optional]
    public ?string $lte;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $gte = null, ?string $lte = null): self
    {
        $self = new self;

        null !== $gte && $self['gte'] = $gte;
        null !== $lte && $self['lte'] = $lte;

        return $self;
    }

    /**
     * Returns only recordings with a start time later than or equal to the given ISO 8601 datetime.
     */
    public function withGte(string $gte): self
    {
        $self = clone $this;
        $self['gte'] = $gte;

        return $self;
    }

    /**
     * Returns only recordings with a start time earlier than or equal to the given ISO 8601 datetime.
     */
    public function withLte(string $lte): self
    {
        $self = clone $this;
        $self['lte'] = $lte;

        return $self;
    }
}
