<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieve details of a specific conference participant by their ID or label.
 *
 * @see Telnyx\Services\ConferencesService::retrieveParticipant()
 *
 * @phpstan-type ConferenceRetrieveParticipantParamsShape = array{id: string}
 */
final class ConferenceRetrieveParticipantParams implements BaseModel
{
    /** @use SdkModel<ConferenceRetrieveParticipantParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $id;

    /**
     * `new ConferenceRetrieveParticipantParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConferenceRetrieveParticipantParams::with(id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConferenceRetrieveParticipantParams)->withID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $id): self
    {
        $self = new self;

        $self['id'] = $id;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }
}
