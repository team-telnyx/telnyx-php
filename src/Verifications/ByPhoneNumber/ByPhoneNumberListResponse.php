<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\Verification;
use Telnyx\Verifications\Verification\RecordType;
use Telnyx\Verifications\Verification\Status;
use Telnyx\Verifications\Verification\Type;

/**
 * @phpstan-type ByPhoneNumberListResponseShape = array{
 *   data: list<Verification>, meta: VerifyMeta
 * }
 */
final class ByPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<ByPhoneNumberListResponseShape> */
    use SdkModel;

    /** @var list<Verification> $data */
    #[Required(list: Verification::class)]
    public array $data;

    #[Required]
    public VerifyMeta $meta;

    /**
     * `new ByPhoneNumberListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ByPhoneNumberListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ByPhoneNumberListResponse)->withData(...)->withMeta(...)
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
     * @param list<Verification|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   customCode?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   timeoutSecs?: int|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   verifyProfileID?: string|null,
     * }> $data
     * @param VerifyMeta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
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
     * @param list<Verification|array{
     *   id?: string|null,
     *   createdAt?: string|null,
     *   customCode?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   timeoutSecs?: int|null,
     *   type?: value-of<Type>|null,
     *   updatedAt?: string|null,
     *   verifyProfileID?: string|null,
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
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(VerifyMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
