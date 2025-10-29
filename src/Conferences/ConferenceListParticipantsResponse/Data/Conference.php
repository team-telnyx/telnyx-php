<?php

declare(strict_types=1);

namespace Telnyx\Conferences\ConferenceListParticipantsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Info about the conference that the participant is in.
 *
 * @phpstan-type ConferenceShape = array{id?: string, name?: string}
 */
final class Conference implements BaseModel
{
    /** @use SdkModel<ConferenceShape> */
    use SdkModel;

    /**
     * Uniquely identifies the conference.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Name of the conference.
     */
    #[Api(optional: true)]
    public ?string $name;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $id = null, ?string $name = null): self
    {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $name && $obj->name = $name;

        return $obj;
    }

    /**
     * Uniquely identifies the conference.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Name of the conference.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }
}
