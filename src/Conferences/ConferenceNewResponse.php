<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConferenceShape from \Telnyx\Conferences\Conference
 *
 * @phpstan-type ConferenceNewResponseShape = array{
 *   data?: null|Conference|ConferenceShape
 * }
 */
final class ConferenceNewResponse implements BaseModel
{
    /** @use SdkModel<ConferenceNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Conference $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConferenceShape $data
     */
    public static function with(Conference|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ConferenceShape $data
     */
    public function withData(Conference|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
