<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\ByPhoneNumber\VerifyMeta;
use Telnyx\VerifyProfiles\VerifyProfile\Call;
use Telnyx\VerifyProfiles\VerifyProfile\Flashcall;
use Telnyx\VerifyProfiles\VerifyProfile\RecordType;
use Telnyx\VerifyProfiles\VerifyProfile\SMS;

/**
 * A paginated list of Verify profiles.
 *
 * @phpstan-type VerifyProfileListResponseShape = array{
 *   data: list<VerifyProfile>, meta: VerifyMeta
 * }
 */
final class VerifyProfileListResponse implements BaseModel
{
    /** @use SdkModel<VerifyProfileListResponseShape> */
    use SdkModel;

    /** @var list<VerifyProfile> $data */
    #[Required(list: VerifyProfile::class)]
    public array $data;

    #[Required]
    public VerifyMeta $meta;

    /**
     * `new VerifyProfileListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyProfileListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyProfileListResponse)->withData(...)->withMeta(...)
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
     *
     * @param list<VerifyProfile|array{
     *   id?: string|null,
     *   call?: Call|null,
     *   created_at?: string|null,
     *   flashcall?: Flashcall|null,
     *   language?: string|null,
     *   name?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   sms?: SMS|null,
     *   updated_at?: string|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }> $data
     * @param VerifyMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(array $data, VerifyMeta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<VerifyProfile|array{
     *   id?: string|null,
     *   call?: Call|null,
     *   created_at?: string|null,
     *   flashcall?: Flashcall|null,
     *   language?: string|null,
     *   name?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   sms?: SMS|null,
     *   updated_at?: string|null,
     *   webhook_failover_url?: string|null,
     *   webhook_url?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param VerifyMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(VerifyMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
