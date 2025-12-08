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
 * @phpstan-type ConferenceGetResponseShape = array{data?: Conference|null}
 */
final class ConferenceGetResponse implements BaseModel
{
    /** @use SdkModel<ConferenceGetResponseShape> */
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
     *   created_at: string,
     *   expires_at: string,
     *   name: string,
     *   record_type: value-of<RecordType>,
     *   connection_id?: string|null,
     *   end_reason?: value-of<EndReason>|null,
     *   ended_by?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(Conference|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Conference|array{
     *   id: string,
     *   created_at: string,
     *   expires_at: string,
     *   name: string,
     *   record_type: value-of<RecordType>,
     *   connection_id?: string|null,
     *   end_reason?: value-of<EndReason>|null,
     *   ended_by?: EndedBy|null,
     *   region?: string|null,
     *   status?: value-of<Status>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(Conference|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
