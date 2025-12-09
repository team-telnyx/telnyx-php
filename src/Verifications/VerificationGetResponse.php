<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\Verification\RecordType;
use Telnyx\Verifications\Verification\Status;
use Telnyx\Verifications\Verification\Type;

/**
 * @phpstan-type VerificationGetResponseShape = array{data: Verification}
 */
final class VerificationGetResponse implements BaseModel
{
    /** @use SdkModel<VerificationGetResponseShape> */
    use SdkModel;

    #[Required]
    public Verification $data;

    /**
     * `new VerificationGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerificationGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerificationGetResponse)->withData(...)
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
     * @param Verification|array{
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
     * } $data
     */
    public static function with(Verification|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Verification|array{
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
     * } $data
     */
    public function withData(Verification|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
