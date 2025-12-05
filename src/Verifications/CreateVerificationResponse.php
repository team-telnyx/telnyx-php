<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Verifications\Verification\RecordType;
use Telnyx\Verifications\Verification\Status;
use Telnyx\Verifications\Verification\Type;

/**
 * @phpstan-type CreateVerificationResponseShape = array{data: Verification}
 */
final class CreateVerificationResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<CreateVerificationResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public Verification $data;

    /**
     * `new CreateVerificationResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreateVerificationResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreateVerificationResponse)->withData(...)
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
     *   created_at?: string|null,
     *   custom_code?: string|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   timeout_secs?: int|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   verify_profile_id?: string|null,
     * } $data
     */
    public static function with(Verification|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Verification|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   custom_code?: string|null,
     *   phone_number?: string|null,
     *   record_type?: value-of<RecordType>|null,
     *   status?: value-of<Status>|null,
     *   timeout_secs?: int|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     *   verify_profile_id?: string|null,
     * } $data
     */
    public function withData(Verification|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
