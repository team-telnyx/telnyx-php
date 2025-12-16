<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type VerificationShape from \Telnyx\Verifications\Verification
 *
 * @phpstan-type CreateVerificationResponseShape = array{
 *   data: Verification|VerificationShape
 * }
 */
final class CreateVerificationResponse implements BaseModel
{
    /** @use SdkModel<CreateVerificationResponseShape> */
    use SdkModel;

    #[Required]
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
     * @param VerificationShape $data
     */
    public static function with(Verification|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param VerificationShape $data
     */
    public function withData(Verification|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
