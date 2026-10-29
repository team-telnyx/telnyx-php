<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\Reputation\ExternalVerification;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalVerificationShape from \Telnyx\Enterprises\Reputation\ExternalVerification\ExternalVerification
 *
 * @phpstan-type ExternalVerificationWrappedShape = array{
 *   data: ExternalVerification|ExternalVerificationShape
 * }
 */
final class ExternalVerificationWrapped implements BaseModel
{
    /** @use SdkModel<ExternalVerificationWrappedShape> */
    use SdkModel;

    #[Required]
    public ExternalVerification $data;

    /**
     * `new ExternalVerificationWrapped()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ExternalVerificationWrapped::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ExternalVerificationWrapped)->withData(...)
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
     * @param ExternalVerification|ExternalVerificationShape $data
     */
    public static function with(ExternalVerification|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param ExternalVerification|ExternalVerificationShape $data
     */
    public function withData(ExternalVerification|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
