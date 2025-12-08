<?php

declare(strict_types=1);

namespace Telnyx\Conferences;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\Conference;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\RecordType;
use Telnyx\Conferences\ConferenceListParticipantsResponse\Data\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ConferenceListParticipantsResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class ConferenceListParticipantsResponse implements BaseModel
{
    /** @use SdkModel<ConferenceListParticipantsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id: string,
     *   call_control_id: string,
     *   call_leg_id: string,
     *   conference: Conference,
     *   created_at: string,
     *   end_conference_on_exit: bool,
     *   muted: bool,
     *   on_hold: bool,
     *   record_type: value-of<RecordType>,
     *   soft_end_conference_on_exit: bool,
     *   status: value-of<Status>,
     *   updated_at: string,
     *   whisper_call_control_ids: list<string>,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id: string,
     *   call_control_id: string,
     *   call_leg_id: string,
     *   conference: Conference,
     *   created_at: string,
     *   end_conference_on_exit: bool,
     *   muted: bool,
     *   on_hold: bool,
     *   record_type: value-of<RecordType>,
     *   soft_end_conference_on_exit: bool,
     *   status: value-of<Status>,
     *   updated_at: string,
     *   whisper_call_control_ids: list<string>,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
