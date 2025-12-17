<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\Verification;

/**
 * @phpstan-import-type VerificationShape from \Telnyx\Verifications\Verification
 * @phpstan-import-type VerifyMetaShape from \Telnyx\Verifications\ByPhoneNumber\VerifyMeta
 *
 * @phpstan-type ByPhoneNumberListResponseShape = array{
 *   data: list<VerificationShape>, meta: VerifyMeta|VerifyMetaShape
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
     * @param list<VerificationShape> $data
     * @param VerifyMeta|VerifyMetaShape $meta
     */
    public static function with(array $data, VerifyMeta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<VerificationShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param VerifyMeta|VerifyMetaShape $meta
     */
    public function withMeta(VerifyMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
