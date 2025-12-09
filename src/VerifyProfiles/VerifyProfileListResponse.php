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
     *   createdAt?: string|null,
     *   flashcall?: Flashcall|null,
     *   language?: string|null,
     *   name?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   sms?: SMS|null,
     *   updatedAt?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     * @param VerifyMeta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, VerifyMeta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<VerifyProfile|array{
     *   id?: string|null,
     *   call?: Call|null,
     *   createdAt?: string|null,
     *   flashcall?: Flashcall|null,
     *   language?: string|null,
     *   name?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   sms?: SMS|null,
     *   updatedAt?: string|null,
     *   webhookFailoverURL?: string|null,
     *   webhookURL?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param VerifyMeta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(VerifyMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
