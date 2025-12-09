<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\Conferences\Conference\EndedBy;
use Telnyx\Conferences\Conference\EndReason;
use Telnyx\Conferences\Conference\RecordType;
use Telnyx\Conferences\Conference\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceNewResponseShape = array{data?: Conference|null}
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
     * @param Conference|array{
     *   id: string,
     *   createdAt: string,
     *   expiresAt: string,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   connectionID?: string|null,
     *   endReason?: value-of<EndReason>|null,
     *   endedBy?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(Conference|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Conference|array{
     *   id: string,
     *   createdAt: string,
     *   expiresAt: string,
     *   name: string,
     *   recordType: value-of<RecordType>,
     *   connectionID?: string|null,
     *   endReason?: value-of<EndReason>|null,
     *   endedBy?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(Conference|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
